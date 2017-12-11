$('.navbar-geral .menu li').click(function() {
    var subMenu = $(this).children('.sub-menu');
    if ($('.menu-hamburger').is(':visible')) {
        if (subMenu.is(':visible')) {
            subMenu.hide();
        } else {
            subMenu.show();
        }
    }
});

$('.navbar-geral .menu li').mouseenter(function() {
    var subMenu = $(this).children('.sub-menu');
    if (!$('.menu-hamburger').is(':visible')) {
        subMenu.slideDown();
    }
});

$('.navbar-geral .menu li').mouseleave(function() {
    var subMenu = $(this).children('.sub-menu');
    if (!$('.menu-hamburger').is(':visible')) {
        subMenu.hide();
    }
});

$('.menu-hamburger').click(function() {
    var navbardo = $('.navbar-do');
    if (navbardo.is(':visible')) {
        navbardo.hide();
    } else {
        navbardo.show();
    }
});
