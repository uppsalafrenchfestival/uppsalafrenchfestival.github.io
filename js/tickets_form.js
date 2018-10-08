
function getTotal()
{
    div = document.getElementById("ticket_order");
    divs = div.getElementsByTagName('div');
    
    total = 0;
    nb_tickets = 0;
    for( var i = 0; i < divs.length; i++) 
    {
        var id = divs[i].id;
        if( id == null)
            continue;

        split_line = id.split('_');
        if(split_line.length != 2)
            continue;

        if(split_line[1] == "quantity")
        {
            ticket_type = split_line[0];
            quantity = parseInt(divs[i].innerHTML);
            price_seances = quantity * getPriceTicket(ticket_type); 
            if(divs[i+1].id ==  ticket_type + "_price")
            {
                divs[i+1].innerHTML = price_seances + "SEK";

            }
            total += price_seances;
            if( ticket_type != "festival-pass" )
            {
                nb_tickets += quantity;
            }

        }
    }

    if(nb_tickets >= 3)
    {
        price_reduction = Math.floor(nb_tickets / 3) * getPriceTicket("reduction"); 
        reduction_display = document.getElementById("reduction_price");
        reduction_display.innerHTML = price_reduction + "SEK";
        total += price_reduction;
    }
    return total;
}

function getPriceTicket(ticket_type)
{
    var student_price = document.getElementById('student_price').checked;

    if ( ticket_type == "festival-pass" ) 
    {
        if( student_price == true)
            value = 320;
        else
            value = 350;
    }
    else if ( ticket_type == "reduction")
    {
        if( student_price == true)
            value = -30;
        else
            value = -40;

    }
    else
    {
        if( student_price == true)
            value = 70;
        else
            value = 80;
    }
    return value;
}

function removeOrder()
{

}

function seance_add()
{
    var selected_option = document.getElementById('ticket_type');

    var ticket_type = selected_option.value;
    var ticket_text = selected_option[selected_option.selectedIndex].text;

    addOrder(ticket_type , ticket_text);
}

function addOrder(ticket_type, ticket_text)
{
 

    if(ticket_type == "none")
        return;

    var entry = document.getElementById(ticket_type);
    if( entry == null)
    {   
        price_per_ticket = getPriceTicket(ticket_type);
        code_to_add = "<div class=\"row\" id=\""+ ticket_type + "\">";
        code_to_add += "<div class=\"col-sm-4\" id=\"" + ticket_type + "_text\"> " + ticket_text + " </div>";
        code_to_add += "<div class=\"col-sm-1\" id=\"" + ticket_type + "_quantity\"> 1 </div>";
        code_to_add += "<div class=\"col-sm-1\" id=\"" + ticket_type + "_price\" > "+ price_per_ticket+ "SEK </div> </div>";

        $('#ticket_order').append(code_to_add);
    }
    else
    {
        var quantity_display = document.getElementById(ticket_type + '_quantity');
        var price_display = document.getElementById(ticket_type + '_price');
        if( quantity_display == null || price_display == null ){
            alert("Error");
            return;
        }
        nb_tickets = parseInt(quantity_display.innerHTML);        
        nb_tickets++;
        quantity_display.innerHTML = "" + nb_tickets;

        price_per_ticket = getPriceTicket(ticket_type);
        price = price_per_ticket * nb_tickets;
        price_display.innerHTML =  "" + price + "SEK";
    }
    updateCheckoutValue();
}

function updateCheckoutValue()
{
    var total = getTotal();
    document.getElementById('checkout_tickets').textContent = "Checkout " + total + "kr";
    document.getElementById('order_total').innerHTML = "Total: " + total + "kr";
}

function tickets_form_answer(data)
{
    
    if(data.result == 'success')
    {
//        $('form#contact_form').hide();
        $('#success_message').show();
        $('#error_message').hide();
    }
    else
    {
        $('#error_message').append('<ul></ul>');

        jQuery.each(data.errors,function(key,val)
        {
            $('#error_message ul').append('<li>'+key+':'+val+'</li>');
        });
        $('#success_message').hide();
        $('#error_message').show();

        //reverse the response on the button
        $('button[type="button"]', $form).each(function()
        {
            $btn = $(this);
            label = $btn.prop('orig_label');
            if(label)
            {
                $btn.prop('type','submit' );
                $btn.text(label);
                $btn.prop('orig_label','');
            }
        });

    }
}


$("#ticket_form").ready(function(){
	warning("I am here ");
	
}


$("#ticket_form").submit(function(e)
{
    e.preventDefault();

    $form = $(this);

    $.ajax({
        type: "POST",
        url: 'http://localhost/uppsalafrenchfestival.github.io/php/tickets_handling.php',
        data: $form.serialize(),
        success: tickets_form_answer,
        dataType: 'json'
    });
});

