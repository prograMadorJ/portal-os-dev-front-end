require('../app.js');

$('#btn-cic').addClass('active');
$('.adaptacao').click(function() {
    var id = $(this).data('id');
    $('.adaptacao-detalhes').hide();
    $('.seta').hide();
    $('#'+id).show();
    $('.'+id).show();
    $('.adaptacao').removeClass('active')
    $(this).addClass('active');
});

// Slider
$('.next').click(function(){
    var total = $('.adaptacoes-mb').data('total');
    var next = $(this).data('prox');
    if (next - 1 == 0)
        var prev = total;
    else
        var prev = next - 1;
    $('.amb'+next).show();
    $('.amb'+prev).hide();
    if ((next + 1) == (total + 1)) {
        $(this).data('prox', 1);
        $('.prev').data('prox', prev);
    }
    else {
        $(this).data('prox', next + 1);
        $('.prev').data('prox', prev);
    }
});
$('.prev').click(function(){
    var total = $('.adaptacoes-mb').data('total');
    var prev = $(this).data('prox');
    if ((prev + 1) == (total + 1))
        var next = 1;
    else
        var next = prev + 1;
    $('.amb'+prev).show();
    $('.amb'+next).hide();
    if (prev - 1 == 0) {
        $(this).data('prox', total);
        $('.next').data('prox', next);
    }
    else {
        $(this).data('prox', prev - 1);
        $('.next').data('prox', next);
    }
});

$('.box-con .botao').click(function() {
    var id = $(this).data('id');
    $('#c'+id).slideDown();
});
$('.box-con .conteudo').click(function() {
    $(this).slideUp();
});

$('.sem-borda').mouseenter(function() {
    $(this).parent().children().each(function(i) {
        $(this).removeClass('borda');
    });
    $(this).addClass('borda');
});
