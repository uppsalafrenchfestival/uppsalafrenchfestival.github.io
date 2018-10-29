---
layout: page
title: Uppsala French FilmFestival Ticket
permalink: /en/tickets1.php
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



<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo "I have some data here";	
	echo $POST["seance0_input"];
	echo "HERE";
}
else
{
	echo "You should not land here, to order tickets please go <a href=\"{{ site.url }}/{{ page.lang}}/tickets.php\"> here </a>";
}
?>

