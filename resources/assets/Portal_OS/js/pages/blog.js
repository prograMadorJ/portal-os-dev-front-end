var conta = 6;
var clique = 0;
console.log("declara conta e clique", conta, clique);

$.event('#carregar', 'click', function () {
    clique++;
    skip = conta * clique;
    console.log("entra no evento: clique, skip e conta", clique, skip, conta);

    var categoria = $.getAttribute('.blog-post', 'category');
    var rota = $.route(this) + '?categoria=' + categoria + '&limit=6&skip=' + skip;
    console.log("categoria e rota, logo antes de entrar no HttpRequest", categoria, rota);

    console.log('quant. posts anterior: '+conta);

    HttpRequest.get(rota, function (res) {
        console.log("entro no http request", HttpRequest);
        if (res.data != "") {
            console.log("entrou no if", res);
            $.append('.blog__main', res.data);
        } else {
            console.log("entrou no else", res);
            $.replaceAll('.none', "sem mais artigos para carregar");
            $.css('.none', 'pointer-events: none !important; background-color: lightgrey;');
        }
    });
});
