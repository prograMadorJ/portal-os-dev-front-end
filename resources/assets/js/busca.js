$('#icone-busca').click(function () {
    if ($('.hidden-busca').is(":hidden")) {
        $('.hidden-busca').slideDown('fast');
    } else {
        $('.hidden-busca').slideUp('fast');
    }
});
