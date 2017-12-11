require ('../app.js');

$('#view-more').click(function() {
    var page_des = $(this).data('page')
    $.ajax({
        url: '/depoimentos/page?page_des='+(page_des),
        method: 'GET',
        success: function(data) {
            $('#body').append(data);
            ativaScroll();
            ativaBtnReadMore();
            hideContentMobile();
        }
    });
    $(this).data('page', (page_des+4));
    if ((page_des+4) > $(this).data('total')) {
        $(this).hide();
    }
});

$('#second-view-more').click(function() {
    var page_dep = $(this).data('page')
    $.ajax({
        url: '/depoimentos/page/second?page_dep='+(page_dep),
        method: 'GET',
        success: function(data) {
            $('#second-body').append(data);
            ativaScroll();
            ativaBtnReadMore2();
            hideContentMobile2();
        }
    });
    $(this).data('page', (page_dep+4));
    if ((page_dep+4) > $(this).data('total')) {
        $(this).hide();
    }
});

function ativaScroll() {
    $('.conteudo-foto').scroll(function() {
        var fim = $(this).scrollTop();
        if (fim > 0) {
            $(this).find('span').fadeOut();
            $(this).find('.mask').fadeOut();
        } else {
            $(this).find('span').fadeIn();
            $(this).find('.mask').fadeIn();
        }
    });
}

function ativaBtnReadMore() {
    $('.btn-read-more').click(function() {
        var id = $(this).data('id');
        if ($('#'+id).is(':visible')) {
            $('#'+id).slideUp(1000);
        } else {
            hideContentMobile();
            $('#'+id).slideDown(1000);
        }
    });
}

function ativaBtnReadMore2() {
    $('.btn-read-more-2').click(function() {
        var id = $(this).data('id');
        if ($('#'+id).is(':visible')) {
            $('#'+id).slideUp(1000);
        } else {
            hideContentMobile2();
            $('#'+id).slideDown(1000);
        }
    });
}

function hideContentMobile() {
    $('.conteudo-mobile').hide();
}

function hideContentMobile2() {
    $('.conteudo-mobile-2').hide();
}

hideContentMobile();
hideContentMobile2();
ativaScroll();
ativaBtnReadMore();
ativaBtnReadMore2();
