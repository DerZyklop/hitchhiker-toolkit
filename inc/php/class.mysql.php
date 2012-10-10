<?php

/*
.---------------------------------------------------------------------------.
|     Admin: Nils Neumann (mail@der-zyklop.de)                              |
'---------------------------------------------------------------------------'
*/

// Was diese Klasse kann:
// $_______->db_connect();
// $_______->db_table_install();

class nn_mysql {

	/* MySQL-Zugangsdaten */
	var $db_host;
	var $db_user;
	var $db_pass;

	var $db_name;
  var $db_table;

	var $con;

	// get_userlist() Holt sich die User aus der Datenbank und gibt diese in eine Array zurück
	function get_userlist () {
		$fnoet = "SELECT * FROM ".$this->db_table." ORDER BY id DESC;";
		$res_fnoet = mysql_query($fnoet);
		while ( $foo = mysql_fetch_array($res_fnoet) ) {
			$userlist_arr[] = $foo;
		};
		return $userlist_arr;
	}

	function db_connect () {
		if (
			!isset($this->db_host) ||
			!isset($this->db_user) ||
			!isset($this->db_pass)
		) {
			$message = 'Bitte gebe den Host, User und Pass deiner Datenbank in der config.php an.';
			return $message;
		}
		else {
			$this->con = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
			return $this->con;
		};
	}

	function db_table_install ($con, $tablename, $sql_table_structure) {
	$message .= '<p>';
		if (!$con) {
			$message .= "Hier ist was kaputt gegangen! Bitte <a href=\"mailto:".$admin_mail_adress."\">".$admin_mail_adress."</a> bescheid sagen.<br />Danke für deine Hilfe!";
			die('<br />Ungültige Abfrage: ' . mysql_error());
		}
		else {
			$message .= 'Verbindung mit MySQL: check! <br />';
			if( !mysql_select_db($this->db_name, $con) ){
				$message .= 'Verbindung zur Datenbank: ohsh… <br />';
				$message .= '"mysql_select_db($this->db_name, $con)": ';
				var_dump(mysql_select_db($this->db_name, $con));
			} else {
				$message .= 'Verbindung zur Datenbank: check! <br />';
				if (!$tablename) {
					$message .= 'Kein Tabellen-Name angegeben... Korrigier das mal in der "config.php".<br />';
				} else {
					$message .= 'Gewünschter Tabellen-Name: <strong>"'.$tablename.'"</strong>. <br />';
				};
				$q      = "SHOW TABLES";
				$tables = mysql_query( $q );
				$i = 0;
				$table_exists = false;
				while ($j = mysql_fetch_array($tables)) {
				  $tables_arr[$i] = $j[0];
					if ($j[0] == $tablename) {
						$table_exists = true;
						break;
					};
				};
				if ( $table_exists ){
					$message .= 'Die Tabelle <strong>"'.$tablename.'"</strong> existiert schon.<br />';
				} else {
				  $sql_input = "CREATE TABLE IF NOT EXISTS ".$tablename." (".$sql_table_structure.")";
				  if ( mysql_query($sql_input)) {
						$message .= 'Yeah! Die Tabelle <strong>"'.$tablename.'"</strong> wurde erstellt<br />';
					} else {
		  			$message .= 'Die Tablle "'.$tablename.'" konnte - warum auch immer - nicht erstellt werden. Vielleicht ist\'s ein fehler in der SQL-Scheibweise?';
  				};
				};
			};
		};
  	$message .= '</p>';
    return $message;
	}
	
	
	function forgetfulness_check ($the_keeper) {
		$the_keeper_arr = explode(' ',$the_keeper['empfaenger']);
		$user_list_arr = $this->get_userlist();
		$return = 0;
		foreach ($user_list_arr as $single_entry) {
			if ($single_entry['first_name'] && $single_entry['last_name']) {
				if(
					(utf8_encode($single_entry['first_name']) == $the_keeper_arr[0]) &&
					(utf8_encode($single_entry['last_name']) == $the_keeper_arr[1])
				){
					$entry_date = date('Y-m-d', strtotime($the_keeper['date']));
					$lastWeek = date('Y-m-d', time() - (7 * 24 * 60 * 60));
					if ($lastWeek > $entry_date) {
						$return = $single_entry['email'];
					};
				};
			};
		};
		if($return){
			return $return;
		} else {
			return false;
		};
	}
};
?>