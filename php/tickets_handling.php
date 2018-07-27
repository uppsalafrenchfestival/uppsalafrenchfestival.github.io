
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $email = htmlspecialchars($_POST['email']); // this is the sender's Email address
    $name = htmlspecialchars($_POST['name']);
    $address =  htmlspecialchars($_POST['address']);
    $zipcode =  htmlspecialchars($_POST['zipcode']);
    $city =  htmlspecialchars($_POST['city']);
    $ticket_class =  htmlspecialchars($_POST['ticket_class']);
    $pdf_ticket = generate_ticketPDF(0, $name, $address, $email, $zipcode , $ticket_class);

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
    $mail->AddAddress($email , $name); // ajout du destinataire
    $mail->From = "webmaster@fff-afuppsala.se"; // adresse mail de l’expéditeur
    $mail->FromName = "Uppsala Franska Festival"; // nom de l’expéditeur
    $mail->AddReplyTo("webmaster@fff-afuppsala.se","Uppsala Franska Festival"); // adresse mail et nom du contact de retour
    $mail->IsHTML(true); // envoi du mail au format HTML
    $mail->Subject = "Uppsala Franska Festival -- Your Order "; // sujet du mail
    $mail->Body = "<html> <h1> Your order has been processed  !! </h1>
        <p> If you have any problem, you can contact us by webmaster@fff-afuppsala.se or the contact form on the website </p>
        <p> You can find your tickets attached to this mail</p>
        <p> Please bring your tickets when going , an ID could be asked </p>
        <br />
        <br />
        <p>Kind regards,<br /> The Uppsala Franska Festival Team </p>

         </html> ";

    $mail->AddAttachment( $pdf_ticket );

    $response = array();
    if(!$mail->Send()) { 
        $response['result'] = "failed";
    } 
    else {
      $response['result'] = "success";
    }
    
    echo json_encode($response);
}


function generate_ticketPDF($id, $name, $address, $email, $zipcode , $ticket_class)
{
    require __DIR__ . '/fpdf.php';

    $pdf_name = "ticket_". $id . ".pdf";
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);

    $pdf->MultiCell(80,4,utf8_decode( "Ticket ID = " . $id) , 0 , 1);
    $pdf->MultiCell(80,4,utf8_decode( "Name " . $name) , 0 , 1);
    $pdf->MultiCell(80,4,utf8_decode( "Address " . $address) , 0 , 1);
    $pdf->MultiCell(80,4,utf8_decode( "Zipcode " . $zipcode) , 0 , 1);
    $pdf->MultiCell(80,4,utf8_decode( "Ticket Class " . $ticket_class) , 0 , 1);

    $pdfdoc = $pdf->Output("F", $pdf_name);
    //$attachment = chunk_split(base64_encode($pdfdoc));

    return $pdf_name;
}

?>
