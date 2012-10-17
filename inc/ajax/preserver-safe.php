<?php 
require_once('config.php');

mysql_select_db( $mysql->db_name, $mysql->db_connect() );
$last_res = mysql_query("SELECT * FROM preserver WHERE username = 'zyklop';");

$last_res = mysql_fetch_array($last_res);

if ( 
  $last_res['username'] == $_POST['username'] &&
  $last_res['color'] == $_POST['color'] &&
  $last_res['manufacturer'] == $_POST['manufacturer'] &&
  $last_res['current_location'] == $_POST['current_location'] &&
  $last_res['additional_notes'] == $_POST['additional_notes']
) {
  echo('thx. You already said that...');
} else {
  /* Writing to DB [BEGIN] */

  $writing_res = mysql_query("INSERT INTO `".$mysql->db_table."`
  ( 
  `username` , `color` , `manufacturer`, `current_location`, `additional_notes`
  ) 
  VALUES
  (
  '".$_POST['username']."', '".$_POST['color']."', '".$_POST['manufacturer']."', '".$_POST['current_location']."', '".$_POST['additional_notes']."'
  );");
  echo('Storing your data');
}