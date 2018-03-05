/*
    declaração de variaveis
 */
var
    HttpRequest = {},
    $ = {};

/*
    função executa requisição do tipo get ao servidor remoto
    passando como parametros a 'url'
    e executa a função resposta através do parametro 'funcResponse'
 */
HttpRequest.get = function (url, funcResponse) {
    axios.get(url)
        .then(funcResponse)
        .catch(function (error) {
            console.log(error);
        });
}
/*
    função executa requisição do tipo post ao servidor remoto
    passando como parametros a 'url'
    o conteudo dos campos através do parametro 'content'
    e executa a função resposta através do parametro 'funcResponse', esse parametro é
    de uso preferencial caso queira executar algo após a requisção post.
 */
HttpRequest.post = function (url,content, funcResponse) {
    axios.post(url,content)
        .then(funcResponse)
        .catch(function (error) {
            console.log(error);
        });
}
/*
     função retorna um elemento html através do nome da classe
     ou ID
 */
$ = function (classNameElement) {
    return document.querySelector(classNameElement);
}
/*
    função adiciona listeners ao elemento html através do nome da classe
    ou ID para executar um evento passado seu tipo por parametro 'typeEvent'
    para executar uma função passado por parametro 'callback'.
 */
$.event = function (classNameElement,typeEvent,callback) {
   $(classNameElement).addEventListener(typeEvent,callback);
}