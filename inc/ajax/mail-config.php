<?php

/* Email-Stuff [BEGIN] */
require_once('../php/phpmailer/class.phpmailer.php');

// Neue Instanz erzeugen
$mailer = NEW PHPMailer;

//Absenderadresse der Email setzen
$mailer->From = "mail@der-zyklop.de";
//Name des Abenders setzen
$mailer->FromName = "Hitchtool";

//Empfänger-Email-Adresse setzen
$recipent_adress = 'inyo@gmx.de';
$mailer->AddAddress($recipent_adress);

/* Email-Stuff [END] */

?>