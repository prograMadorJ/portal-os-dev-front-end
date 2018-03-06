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
     ,ID ou o objeto do proprio elemento
 */
$ = function (elementClassName) {
    var objType = typeof elementClassName;
    return (objType !== null && objType === 'object') ?
        elementClassName :
        document.querySelector(elementClassName);
}
/*
    função adiciona listeners ao elemento html através do nome da classe
    ou ID do elemento alvo por paramentro 'elementClassName'
    para executar um evento passado seu tipo por parametro 'eventType'
    para executar uma função passado por parametro 'callback'.
 */
$.event = function (elementClassName,eventType,callback) {
   $(elementClassName).addEventListener(eventType,callback);
}
/*
    função modifica o atributo style do elemento
    passando o nome da classe ou ID do elemento alvo por parametro 'elementClassName'
    e passando um texto css em linha por parametro 'styleCSS'
 */
$.css = function(elementClassName,styleCSS) {
    $(elementClassName).setAttribute('style',styleCSS);
}
/*
    função reseta o atributo style do elemento
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName'
 */
$.resetCSS = function (elementClassName) {
    $(elementClassName).removeAttribute('style');
}
/*
    função oculta um elemento
    passando o nome do elemento alvo
    por parametro 'elementClassName'
 */
$.hidden = function (elementClassName) {
    $.css(elementClassName,'display:none !important');
}
/*
    função exibe um elemento que estava oculto
    passando o nome do elemento alvo
    por parametro 'elementClassName' e preferencialmente
    o tipo do atributo css display por parametro 'displayType'
    caso não use este parametro o valor default é 'flex'
 */
$.show = function (elementClassName,displayType) {
    $.css(elementClassName,'display:'+(displayType||'flex'));
}
/*
    função adiciona uma classe ao atributo class do elemento
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName' e o nome da classe a ser adicionada
    por parametro 'className'
 */
$.addClass = function (elementClassName,className) {
    $(elementClassName).classList.add(className);
}
/*
    função remove uma classe do atributo class do elemento
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName' e o nome da classe a ser removida
    por parametro 'className'
 */
$.removeClass = function (elementClassName,className) {
    $(elementClassName).classList.remove(className);
}
/*
    função remove o atributo class do elemento
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName'
 */
$.removeAllClass = function (elementClassName) {
    $(elementClassName).removeAttribute('class');
}
/*
    função inclui um elemento HTML dentro de outro
    após o ultimo elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTML'
 */
$.append = function (elementClassName,contentHTML) {
    $(elementClassName).insertAdjacentHTML('afterend',contentHTML);
}
/*
    função inclui um elemento HTML dentro de outro
    antes do primeiro elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTML'
 */
$.prepend = function (elementClassName,contentHTML) {
    $(elementClassName).insertAdjacentHTML('beforebegin',contentHTML);
}