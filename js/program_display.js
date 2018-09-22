

function display_program()
{
    $('#scolar_layout').fadeOut();
    $('#bergman_layout').fadeOut();
    $('#theme_layout').fadeOut();

    $('#programme_layout').fadeIn();
}

function display_theme()
{
    $('#programme_layout').fadeOut();
    $('#scolar_layout').fadeOut();
    $('#bergman_layout').fadeOut();

    $('#theme_layout').fadeIn();
}

function display_bergman()
{
    $('#programme_layout').fadeOut();
    $('#theme_layout').fadeOut();
    $('#scolar_layout').fadeOut();

    $('#bergman_layout').fadeIn();
}

function display_school()
{
    $('#programme_layout').fadeOut();
    $('#theme_layout').fadeOut();
    $('#bergman_layout').fadeOut();

    $('#scolar_layout').fadeIn();

}

