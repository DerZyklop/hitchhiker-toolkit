<?php
require_once('mail-config.php');

//Empfänger-Email-Adresse setzen
$mailer->AddAddress($_POST['recipent_adress']);


$mailer->Subject = "I'm hitchhiking!";
$mailer->Body = "Hi there!
i'm ";
if ( isset($_POST['from_location']) && $_POST['from_location']!=false ) {
  $mailer->Body .= "at ";
  $mailer->Body .= $_POST['from_location'].' ';
};
$mailer->Body .= "sitting in a ";
if ( isset( $_POST['color'] ) && $_POST['color']!=false ) {
  $mailer->Body .= $_POST['color'];
}
$mailer->Body .= ' ';
if ( isset($_POST['manufacturer']) && $_POST['manufacturer']!=false ) {
  $mailer->Body .= $_POST['manufacturer'];
} else {
  $mailer->Body .= 'car';
}
$mailer->Body .= " now.


";
if ( isset($_POST['additional_notes']) && $_POST['additional_notes']!=false ) {
  $mailer->Body .= 'Additional Notes: ';
  $mailer->Body .= $_POST['additional_notes'];
};
$mailer->Body .= "


I just wanted to let you know so you are not worried about me.

This is a generated mail from http://zyklop.pisces.uberspace.de/hitchhiker/ -> A awsome mobile toolkit for hitchhikers.";


if(!$mailer->Send()) {
  echo "Mailer Error: ".$mailer->ErrorInfo.'';
} else {
  echo "Message send!";
}

?>
