<?php


require_once('../php/functions.php');

/* MYSQL-Stuff [BEGIN] */

require_once('../php/class.mysql.php');

// Neue Instanz erzeugen
$mysql = NEW nn_mysql;

// Gewünschter Tabellen-Name
$mysql->db_table = 'preserver';

// MySQL-Zugangsdaten
$mysql->db_host = '127.0.0.1:3306';
$mysql->db_user = 'zyklop';
$mysql->db_pass = 'DokDawtiag';
$mysql->db_name = 'zyklop_hitchhiker';

/* MYSQL-Stuff [END] */

?>