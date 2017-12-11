// import Inputmask from "inputmask";

// require ('./modernizr.custom.53451');

require ('../app.js');

require ('./jquery.gallery.js');

require ('./angular.min');
require ('./angular-touch.min');
require ('./angular-carousel.min');

var active_blog = 1;

var active_blog_mb = 1;

$('.next_prev').click(function() {
    var total = $('#nav_next_prev').data('total');
    var go = $(this).data('go');
    if ((active_blog + go) == (total+1)) {
        document.location = "/blog";
    } else {
        $('#artigo-'+active_blog).hide();
        active_blog += go;
        active_blog = active_blog == 0 ? total : active_blog == (total+1) ? 1 : active_blog;
        $('#artigo-'+active_blog).show();
        $('.bulls').children('span').each(function() {
            if ($(this).data('id') == active_blog) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });
    }
});

$('.arrow-blog').click(function() {
    var total = $(this).data('total');
    var go = $(this).data('go');
    if ((active_blog_mb + go) == (total+1)) {
        document.location = "/blog";
    } else {
        $('#blog-'+active_blog_mb).hide();
        active_blog_mb += go;
        active_blog_mb = active_blog_mb == 0 ? total : active_blog_mb == (total+1) ? 1 : active_blog_mb;
        $('#blog-'+active_blog_mb).show();
        $('#arrow-blog').children('span').each(function() {
            if ($(this).data('id') == active_blog_mb) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });
    }
});

$('#dg-container').gallery();

$('.dg-prev, .dg-next').click(function() {
    if ($('.menu-hamburger').is(':visible')) {
        $('.colours').children('img').hide();
    }
    $('.produto').removeClass('colours');
    setTimeout(function() {
        if ($('.menu-hamburger').is(':visible')) {
            $('.produto').hide();
            $('.dg-center').show();
            $('.dg-center').children('img').show();
        }
        $('.dg-center').addClass('colours');
    }, 1000);

});

function init() {
    if ($('.menu-hamburger').is(':visible')) {
        $('.produto').hide();
        $('.dg-center').show();
    }
    $('.dg-center').addClass('colours');

    // $('#telefone').inputmask("99-9999999");
}

init();

angular.module('AppProdutos', [
  'angular-carousel'
]).controller('DemoCtrl', function($scope) {
});
