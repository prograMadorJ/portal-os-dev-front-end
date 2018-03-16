var conta = 6;
var clique = 0;

$.event('#carregar', 'click', function () {
    clique++;
    skip = conta * clique;

    var categoria = $.getAttribute('.blog-post', 'categorie');
    var rota = $.route(this) + '?categoria=' + categoria + '&limit=6&skip=' + skip;

    HttpRequest.get(rota, function (res) {
        if (res.data != "") {
            $.append('.blog__main', res.data);
        } else {
            $.replaceAll('.none', "sem mais artigos para carregar");
            $.css('.none', 'pointer-events: none !important; background-color: lightgrey;');
        }
    });
});
