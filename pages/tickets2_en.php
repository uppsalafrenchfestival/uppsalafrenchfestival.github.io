---
layout: page
title: Uppsala French FilmFestival Ticket
permalink: /en/tickets2
ref: tickets2
lang: en
---

<!-- Slider Start -->
<section id="global-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1> Test de Tickets </h1>
          <p> </p>
        </div>
      </div>
    </div>
  </div>
</section>



<?php 

require __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	\Stripe\Stripe::setApiKey("sk_live_MLxUJdDtMUwu0766YFBwzl9V");

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$token = $_POST['stripeToken'];

	$charge = \Stripe\Charge::create([
	    'amount' => 800,
	    'currency' => 'eur',
	    'description' => 'Example Greg charge',
	    'source' => $token,
	]);
	$name=$_POST["name"];
	$email=$_POST["email"];
	$token=$_POST["stripeToken"];
}
else
{
	$name= "Name";
	$email= "Email";
	$token= "Empty";
}
?> 

<p> Welcome <?php echo $name ?> </p> <br>
<p> Your email address is: <?php echo $email ?> </p>
<br />
<p> Has transaction happened ? <?php echo $token ?> </p>
