---
layout: page
---

<!-- Slider Start -->
<section id="global-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1> Tickets </h1>
          <p> </p>
        </div>
      </div>
    </div>
  </div>
</section>

{% assign page_text = site.data.navigation.tickets[page.lang] %}


<!-- contact form start -->
<section id="contact-form">
  <div class="container">
    <div class="row">
    
      <div class="col-md-6 col-sm-12">
        <div class="block">
            <h1> Tickets </h1>
            <p> {{ page_text["pass"] }} </p>
            <p> Regular Prices:  80kr for one film, 200kr for 3 films</p>
            <p> Student Prices(*):  70kr for one film, 180kr for 3 films</p>
            <p> Opening Ceremony: 120kr </p>
            <p> *: Justification will be asked </p>
            <br />
            <br />
            
      <fieldset> <legend>  Ordering your tickets </legend>    
           <form action="{{ site.url }}/{{ page.lang }}/tickets1.php" method="POST">
          
          
              <?php 
            	echo "Hello !\n";
            	$db = mysqli_connect('localhost', 'root', 'gregorie');

		mysqli_select_db($db , "UFFF");
		$sql = "SELECT * FROM seances";
		$req = mysqli_query($db , $sql);

	    while($data = mysqli_fetch_assoc($req))
	    {
                echo $data["film"];
                echo "<input type=\"button\" onclick=\"seance_add(" . $data["id"] . ")\" value=\"+\" >";
                echo "<input id=\"seance". $data["id"] . "_input\" name=\"seance". $data["id"] . "_input\" \
                           type=\"text\" value=\"0\" autocomplete=off readonly=\"readonly\">";  
                echo "<input type=\"button\" onclick=\"seance_remove(" . $data["id"] . ")\"  value=\"-\" >";

		echo "<br />";
	    }

		mysqli_close($db);
      
            ?>


          <div>
            <h4> Your Order </h4>
            <div class="container" id="ticket_order">
              <div class="row">
                <div class="col-sm-4"> <b> Film </b> </div>
                <div class="col-sm-1"> <b> Quantity </b> </div>
                <div class="col-sm-1"> <b> Price </b> </div>
              </div>
            </div>
            <br /> 
            <div class="container" id="ticket_order">
              <div class="row">
                <div class="col-sm-4"> Reduction </div>
                <div class="col-sm-1" >  </div>
                <div class="col-sm-1" id="reduction_price"> 0SEK </div>
              </div>
            </div>
          </div>
          <div class="form-group">            
              Student Price: <input type="checkbox" name="student_price" onClick="updateCheckoutValue()" id="student_price"> 
          </div>       

           <h4 id="order_total"> Total: 0kr </h4>
           <button class="btn btn-default" type="submit" id="checkout_tickets" >Checkout: 0kr</button>
           </form>
           </fieldset>
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
