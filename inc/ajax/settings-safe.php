<?php 
require_once('config.php');

echo('Done!');
?>
<?php 
  mysql_select_db( $mysql->db_name, $mysql->db_connect() );
  /* Writing to DB [BEGIN] */
/*
var_dump($_COOKIE['username']);

var_dump($_POST['username']);
var_dump($_POST['from_location']);
var_dump($_POST['to_location']);
var_dump($_POST['send_mail']);
var_dump($_POST['contact_person']);
var_dump($_POST['store_to_db']);


  $writing_res = mysql_query("INSERT INTO `".$mysql->db_table."`
  ( 
  `username` , `start_location` , `target_location`
  ) 
  VALUES
  (
  'DerZyklop', 'Giessen', 'Bristol'
  );");


  var_dump( $writing_res );
  $reading_res = mysql_query("SELECT * FROM preserver WHERE username = 'DerZyklop';");

  foreach (mysql_fetch_array($reading_res) as $res) {
    var_dump( $res );
  }

*/











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