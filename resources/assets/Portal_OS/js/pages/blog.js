var conta = 0;
var clique = 0;

$.event('#carregar', 'click', function () {

    conta = $.all('.blog-post').length; // pega quantidade de posts atuais
    clique++;
    skip = conta * clique;

    var categoria = $.getAttribute('.blog-post','categorie'),
        route = $.route(this) + '?categoria=' + categoria + '&limit=6&skip=' + skip;

    console.log(route+'\n quant. posts anterior: '+conta); // descomente apenas para testes

    HttpRequest.get(route, function (res) {
        if (res.data != "") {
            $.append('.blog__main', res.data);
        } else {
            $.replaceAll('.none', "sem mais artigos para carregar");
            $.css('.none', 'pointer-events: none !important; background-color: lightgrey;');
        }
    });
});
