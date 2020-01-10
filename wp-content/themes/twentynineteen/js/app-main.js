var $ = jQuery;

$( document ).ready(function() {
    // MANAGE MENU NAVIGATION IN SLIDER MODE
    $('.menu__expander-link').click(function (e) {
        e.preventDefault();
        $('.site-navigation-container').addClass('open');
    });
    $('.menu__expand-closer-link').click(function (e) {
        e.preventDefault();
        $('.site-navigation-container').removeClass('open');
    }); 

    //MANAGE THE SUBMENU DISPLAY IN NAVIGATION SLIDER MODE
    $('.submenu__expander').click(function(e) {
        e.preventDefault();

        if($(this).closest('.menu-item-has-children').hasClass('open-submenu')) {
            $(this).closest('.menu-item-has-children').removeClass('open-submenu');
            return;
        }

        $('.menu-item-has-children.open-submenu').removeClass('open-submenu');    
        $(this).closest('.menu-item-has-children').toggleClass('open-submenu');
    });

});