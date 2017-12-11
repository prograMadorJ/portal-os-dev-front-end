require ('../app.js');

$('.btn-next').click(function() {
    var check = $(this).data('submit');
    var id = $(this).data('id');
    if (check === 0) {
        $('#form_'+id).hide();
        $('#form_'+(id+1)).show();
    } else {
        $('#form_teste').submit();
    }
    var id1 = 0;
    $('.bolinhas').children('span').each(function() {
        // console.log($(this).data('id'));
        console.log(id1);
        if (id1 != 0) {
            $(this).addClass('active');
        }
        if ($(this).attr('class') == 'active' && id1 == 0) {
            $(this).removeClass('active');
            id1 = 1;
        } else {
            id1 = 0;
        }
    });
});

$("input[type=radio]").on('change', function() {
    var obs = $(this).data('obs');
    var id = $(this).data('id');
    if ($('.menu-hamburger').is(':visible')) {
        $('.box-info').html(obs);
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
    } else {
        $('.obs').hide();
        if (obs != '') {
            $('.obs_'+id).show();
            $('.obs_'+id).html(obs + '<span class="seta"></span>');
        }
    }
});

if($('.resposta').length == 1){
    $('#intro h2').hide();
    $('.conteudo-hide').hide();
}
