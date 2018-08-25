---
layout: page
title: Uppsala French FilmFestival Ticket
permalink: /en/tickets1
ref: tickets1
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

<!-- contact form start -->
<section id="contact-form">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="block">

          <form action="{{ site.url }}/en/tickets2.php" method="POST">
          <h1> Ordering </h1>
          <p> 1 ticket pour la sociologue et l'ourson : 8E. </p>
                <legend> Your Information </legend>
              <div class="form-group">            
                  <input type="text" class="form-control" name="name" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email Address" required>
              </div>
          <div>
          
              <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_live_MhrspCuoQNb4sajgtC24A9TR"
                data-amount="800"
                data-name="fff-afuppsala.se"
                data-description="Widget"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-zip-code="true"
                data-currency="eur">
              </script>

          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>

<center>
<div id="error_message_tickets">
    <h4>Error !</h4>
    <p>Sorry there was an error sending your form. </p>
  </div>
  <div id="success_message_tickets">
      <h4> Success ! </h4>
      <p>Your Message was Sent Successfully.</p>
  </div>
</center>
