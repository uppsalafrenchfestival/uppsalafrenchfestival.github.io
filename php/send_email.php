
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "webmaster@fff-afuppsala.se"; // this is your Email address
    $from = htmlspecialchars($_POST['mail']); // this is the sender's Email address
    $name = htmlspecialchars($_POST['name']);
    $subject = "[UFFF Website] Contact Info - Subject: " . htmlspecialchars($_POST['subject']);

    $mail = new PHPMailer(true);    
    // Paramètres SMTP
    $mail->IsSMTP(); // activation des fonctions SMTP
    $mail->SMTPAuth = true; // on l’informe que ce SMTP nécessite une autentification
    $mail->SMTPSecure = 'ssl'; // protocole utilisé pour sécuriser les mails 'ssl' ou 'tls'
    $mail->Host = "send.one.com"; // définition de l’adresse du serveur SMTP : 25 en local, 465 pour ssl et 587 pour tls
    $mail->Port = 465; // définition du port du serveur SMTP
    $mail->Username = "webmaster@fff-afuppsala.se"; // le nom d’utilisateur SMTP
    $mail->Password = "Password9705"; // son mot de passe SMTP

    // Paramètres du mail
    $mail->AddAddress("webmaster@fff-afuppsala.se"); // ajout du destinataire
    $mail->From = "webmaster@fff-afuppsala.se";
    $mail->FromName = $name;
    $mail->IsHTML(true); 
    $mail->Subject = $subject; 
    $mail->Body = "<html>  From " . $name . " with mail address : " . $from . "<br /> <br /><b>Message: </b>" . htmlspecialchars($_POST['message']) . " </html> ";


    $response = array();
    if(!$mail->Send()) { 
        $response['result'] = "failed";
    } 
    else {
      $response['result'] = "success";
    }
    
    echo json_encode($response);

}

?>
