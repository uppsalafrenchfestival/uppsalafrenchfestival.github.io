
<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
///*
//Tested working with PHP5.4 and above (including PHP 7 )

// */
//require_once './vendor/autoload.php';

//use FormGuide\Handlx\FormHandler;


//$pp = new FormHandler();

//$validator = $pp->getValidator();
//$validator->fields(['name','email'])->areRequired()->maxLength(50);
//$validator->field('email')->isEmail();
//$validator->field('comments')->maxLength(6000);



//$pp->sendEmailTo('gregory.vaumourin@gmail.com'); 

//echo $pp->process($_POST);

ini_set('display_errors', 'On');
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "webmaster@fff-afuppsala.se"; // this is your Email address
    $from = htmlspecialchars($_POST['mail']); // this is the sender's Email address
    $name = htmlspecialchars($_POST['name']);
    $subject = "[UFF Website] Contact Info - Subject: " . htmlspecialchars($_POST['subject']);
    $message = "From " . $name . "\n\n" . htmlspecialchars($_POST['message']);

    $headers = "From:" . $from;
    $result = mail($to,$subject,$message,$headers);

    $response = array();
    if ( $result === true )
    {
        $response['result'] = "success";    
    }
    else
    {
        $response['result'] = "failed";
    }
    echo json_encode($response);
}

?>
