
function after_form_submitted(data)
{
    
    if(data.result == 'success')
    {
//        $('form#contact_form').hide();
        $('#success_message_tickets').show();
        $('#error_message_tickets').hide();
    }
    else
    {
        $('#error_message_tickets').append('<ul></ul>');

        jQuery.each(data.errors,function(key,val)
        {
            $('#error_message_tickets ul').append('<li>'+key+':'+val+'</li>');
        });
        $('#success_message_tickets').hide();
        $('#error_message_tickets').show();

    }
}

$("#contact_form").submit(function(e)
  {
    e.preventDefault();

    $form = $(this);

    $.ajax({
        type: "POST",
        url: 'http://localhost/uppsalafrenchfestival.github.io/php/send_email.php',
        data: $form.serialize(),
        success: after_form_submitted,
        dataType: 'json'
    });
    
  });

