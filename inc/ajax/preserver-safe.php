<?php 
require_once('config.php');

mysql_select_db( $mysql->db_name, $mysql->db_connect() );
$last_res = mysql_query("SELECT * FROM preserver WHERE username = 'zyklop';");

$last_res = mysql_fetch_array($last_res);

if ( 
  $last_res['username'] == $_POST['username'] &&
  $last_res['color'] == $_POST['color'] &&
  $last_res['manufacturer'] == $_POST['manufacturer'] &&
  $last_res['current_location'] == $_POST['current_location']
  ) {
    echo('thx. You already said that...');
    
  } else {
    /* Writing to DB [BEGIN] */
  
    $writing_res = mysql_query("INSERT INTO `".$mysql->db_table."`
    ( 
    `username` , `color` , `manufacturer`, `current_location`
    ) 
    VALUES
    (
    '".$_POST['username']."', '".$_POST['color']."', '".$_POST['manufacturer']."', '".$_POST['current_location']."'
    );");

    echo("Stored: ".getSpeakingName($_POST['color'])." ".getSpeakingName($_POST['manufacturer'])." at ".$_POST['current_location']);
  }

/*





  $writing_res = $mysql->db_table_install($mysql->con,$mysql->db_table,'id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  	username TEXT NULL,
  	start_location INT(11) NULL,
  	target_location TEXT NULL,
  	user_email_adress TEXT NULL,
  	kontact_person_email_adress TEXT NULL,
  	date TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
  echo( $create_table_res );
*/
  /* Creating the table if not exist [BEGIN] */
  /*
  $create_table_res = $mysql->db_table_install($mysql->con,$mysql->db_table,'id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  	username TEXT NULL,
  	start_location INT(11) NULL,
  	target_location TEXT NULL,
  	user_email_adress TEXT NULL,
  	kontact_person_email_adress TEXT NULL,
  	date TIMESTAMP DEFAULT CURRENT_TIMESTAMP');
  echo( $create_table_res );
  */
  /* Creating the table if not exist [END] */
  ?>