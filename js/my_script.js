
function getTotal()
{
    var student_price = document.getElementById('student_price').checked;
    var ticket_type = document.getElementById('ticket_type').value;

    if ( ticket_type == "price:festival-pass" ) 
    {
        if( student_price == true)
            value = 320;
        else
            value = 350;
    }
    else if ( ticket_type == "price:1ticket") 
    {
        if( student_price == true)
            value = 70;
        else
            value = 80;
    }
    else if ( ticket_type == "price:3tickets")
    {
        if( student_price == true)
            value = 180;
        else
            value = 200;
    }
    else
        value = 0;
    return value;
}


function updateCheckoutValue()
{
    document.getElementById('checkout_button').textContent = "Checkout " + getTotal() + "kr";
}


document.getElementById('checkout_button').addEventListener('click', function(e) {

    window.alert("ICI")    
//    // Open Checkout with further options:
//  handler.open({
//    name: 'Demo Site',
//    description: '2 widgets',
//    currency: 'sek',
//    amount: 2000,
//    zipCode: true,
//    
//  });
//  e.preventDefault();
});



// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



