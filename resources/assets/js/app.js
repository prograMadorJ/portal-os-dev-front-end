/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./load.js');

require('./menu.js');
require("./busca.js");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 $('a[href^="#"]').on('click', function(event) {
     var target = $(this.getAttribute('href'));
     if( target.length ) {
         event.preventDefault();
         $('html, body').stop().animate({
             scrollTop: target.offset().top - 100
         }, 1000);
     }
 });

$(document).on('click', '.btn-whatsapp', function() {
    if ($('#popup_whatsapp').is(':visible')) {
        $('#popup_whatsapp').slideUp('fast');
        $('#lhc_status_container').slideDown('slow');
    } else {
        $('#lhc_status_container').slideUp('fast');
        $('#popup_whatsapp').slideDown('slow');
    }
    loadMask();
    return false;
});

$('.btn-whatsapp-mobile').click(function() {
    $.ajax({
        'url': '/registra-whatsapp',
        'method': 'get',
        success: function(data) { }
    });
});

$('form').submit(function() {
    $('input[type=submit]').html('Enviando...');
    $('input[type=submit]').attr('value', 'Enviando...');
    $('input[type=submit]').attr('disabled', 'true');
});

$('.banner-click').click(function() {
    var id = $(this).data('id');
    var url = $(this).data('href');
    console.log('Ola');
    $.ajax({
        url: '/banners_estatisticas/click/'+id,
        method: 'GET',
        success: function(data) {
            // window.location = url;
        }
    });
});

function loadMask() {
    $('input').attr('autocomplete','off');
}

loadMask();
