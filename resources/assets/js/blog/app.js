require('../app.js');

// Continue lendo
$('#btn-view-more').click(function() {
    var artigo_id = $(this).data('id');

    $.ajax({
        url: '/blog/estatisticas/'+ artigo_id,
        method: 'GET',
        success: function(data) {
            // console.log(data);
        }
    });

    $('#btn-view-more').hide();
    $('#artigo-conteudo').css('height', 'auto');
});

$('#view-more').click(function() {
    var page = $(this).data('page')
    var categoria = $(this).data("categoria");
    $.ajax({
        url: '/blog/'+categoria+'page?page='+(page),
        method: 'GET',
        success: function(data) {
            $('#artigos').append(data);
        }
    });
    $(this).data('page', (page+6));
    if ((page+6) > $(this).data('total')) {
        $(this).hide();
    }
});
