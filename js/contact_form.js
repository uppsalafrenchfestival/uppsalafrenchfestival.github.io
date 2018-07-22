
function after_form_submitted(data)
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

