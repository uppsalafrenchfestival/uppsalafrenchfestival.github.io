<?php 

\Stripe\Stripe::setApiKey("sk_test_yQDvZHN41ftHS5nuqFGCZoXe");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];

$charge = \Stripe\Charge::create([
    'amount' => 800,
    'currency' => 'eur',
    'description' => 'Example Greg charge',
    'source' => $token,
]);
?> 

<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["mail"]; ?>
<br />
<h2> Has transaction happened ? </h2>
<p> <?php echo $_POST["stripeToken"] ?> </p>
<p> Strip Email : <?php echo $_POST["stripeEmail"] ?> </p>

<
</body>
</html> 