
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

