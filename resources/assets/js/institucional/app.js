require('../app.js');

$('.pergunta').click(function() {
    var id = $(this).data('id');
    $('.pergunta').removeClass('active');
    if ($('#resposta-'+id).is(':visible')){
        $('#resposta-'+id).slideUp(1000);
        $(this).children('.icone').html('+');
    } else {
        // Reset tudo
        $('.resposta').slideUp(1000);
        $('.icone').html('+');

        $('#resposta-'+id).slideDown(1000);
        $(this).addClass('active');

        //Mudando icone
        $(this).children('.icone').html('&ndash;');
    }
});

$('.conteudo-nomes').scroll(function() {
    var fim = $(this).scrollTop();
    if (fim > 0) {
        $(this).find('span').fadeOut();
        $(this).find('.mask').fadeOut();
    } else {
        $(this).find('span').fadeIn();
        $(this).find('.mask').fadeIn();
    }
});

$('.btn-historia').click(function() {
    var id = $(this).data('id');
    if ($('#'+id).is(':visible')) {
        $('#'+id).slideUp(1000);
    } else {
        $('.conteudo-mobile').hide();
        $('#'+id).slideDown(1000);
    }
});

$('#estado').change(function() {
    var id = $(this).val();
    $.ajax({
        url: '/credenciamento/cidades/'+id,
        method: 'GET',
        success: function(data) {
            $('#select-cidade').html(data);
        }
    });
});
