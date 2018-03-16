var conta = 6;
var clique = 0;
console.log("conta e clique,", conta, clique);

$.event('#carregar', 'click', function () {
    console.log("entra evento");
    clique++;
    skip = conta * clique;

    var categoria = $.getAttribute('.blog-post', 'categorie');
    var rota = $.route(this) + '?categoria=' + categoria + '&limit=6&skip=' + skip;
    console.log(this);
    console.log("clique++, skip, conta, categoria, rota antes do http", clique, skip, conta, categoria, rota);

    HttpRequest.get(rota, function (res) {
        console.log("entrou no http", res.status);
        if (res.data != "") {
            console.log("entrou no if");
            $.append('.blog__main', res.data);
        } else {
            console.log("entrou no else");
            $.replaceAll('.none', "sem mais artigos para carregar");
            $.css('.none', 'pointer-events: none !important; background-color: lightgrey;');
        }
    });
});
