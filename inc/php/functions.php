<?php

function sentMail($mailer) {
  //EMail senden und überprüfen ob sie versandt wurde
  
  if(!$mailer->Send())
  {
    //$mail->Send() liefert FALSE zurück: Es ist ein Fehler aufgetreten
    $message .= "Die Email konnte nicht gesendet werden";
    $message .= "Fehler: " . $mail->ErrorInfo;
  } else {
    //$mail->Send() liefert TRUE zurück: Die Email ist unterwegs
    $message .= "Die Email wurde versandt.";
  }
  return $message;
}

function getSpeakingName($identifier) {
  switch ($identifier) {
  case 'color-1':
    $result = 'gray/silver';
    break;
  case 'color-2':
    $result = 'black';
    break;
  case 'color-3':
    $result = 'blue';
    break;
  case 'color-4':
    $result = 'white';
    break;
  case 'color-5':
    $result = 'red';
    break;
  case 'color-6':
    $result = 'yellow';
    break;
  case 'color-7':
    $result = 'brown';
    break;
  case 'color-8':
    $result = 'green';
    break;
  case 'color-9':
    $result = 'orange';
    break;
  case 'manufacturer-1':
    $result = 'Audi';
    break;
  case 'manufacturer-2':
    $result = 'BMW';
    break;
  case 'manufacturer-3':
    $result = 'Ford';
    break;
  case 'manufacturer-4':
    $result = 'Mercedes';
    break;
  case 'manufacturer-5':
    $result = 'Opel';
    break;
  case 'manufacturer-6':
    $result = 'Volkswagen';
    break;
  case 'manufacturer-7':
    $result = 'Volvo';
    break;
  case 'manufacturer-8':
    $result = 'Toyota';
    break;
  case 'manufacturer-9':
    $result = 'Smart';
    break;
  case 'manufacturer-10':
    $result = 'Porsche';
    break;
  case 'manufacturer-11':
    $result = 'John Deere tractor';
    break;
  }
  return $result;
}

?>