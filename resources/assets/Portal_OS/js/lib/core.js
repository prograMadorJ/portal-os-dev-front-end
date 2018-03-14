/*
    declaração de variaveis
 */
var $ = {};

/*
     função retorna um elemento html através do nome da classe
     ,ID ou o objeto do proprio elemento
 */
$ = function (elementClassName) {
    return ($._isObject(elementClassName)) ?
        elementClassName :
        document.querySelector(elementClassName);
}
/*
     função retorna todos os elementos html através do nome da classe
     ,ID ou o objeto do proprio elemento.O retorno é em formato Array
 */
$.all = function (elementClassName) {
    return ($(elementClassName) !== null) ?
        Array.from(document.querySelectorAll(elementClassName)) : elementClassName;
}
/*
    função adiciona listeners ao elemento html através do nome da classe
    ou ID do elemento alvo por paramentro 'elementClassName'
    para executar um evento passado seu tipo por parametro 'eventType'
    para executar uma função passado por parametro 'callback'.
 */
$.event = function (elementClassName, eventType, callback) {
    $(elementClassName).addEventListener(eventType, callback);
}
/*
    função retorna se uma elemento HTMl é valido como um objeto
 */
$._isObject = function (element) {
    return (element !== null && typeof element === 'object');
}
/*
    função usa um array passado por paramentro 'array'
    e chama função 'forEach' aplicando uma função callback
    passado por paramentro 'callback' e passando um conteudo ou elemento
    para o paramentro da função callback pelo parametro 'contentHTMLElement
 */
$._applyEach = function (array, contentHTMLElement, callback) {
    array.forEach(function (e, i) {
        callback(e, (Array.isArray(contentHTMLElement)) ? contentHTMLElement[i] : contentHTMLElement);
    });
};
/*
    função retorna a converssão de um conteudo ou elemento
    em conteudo ou elemento de tipo filho de um elemento (childNode)
 */
$._toNode = function (contentHTMLElement) {
    var content = document.createElement('div');
    content.innerHTML = contentHTMLElement;
    return content;
}
/*
    função insere um conteudo ou elemento em uma posição determinada
    passando o nome do elemento como ponto referencial por parametro
    'elementClassName' e o conteudo ou elemento a ser inserido por
    paramentro 'contentHTMLElement' e modo de insersão por parametro
    'insertMode' e como opicional se o conteudo ou elemento será inserido
    como uma copia ou não: se for cópia passa pelo parametro 'copy'
    a palavra literal 'copy' se não, não declarar nehum paramentro
 */
$.insert = function (elementClassName, contentHTMLElement, insertMode, copy) {
    ($._isObject(contentHTMLElement)) ?
        ((copy || false) ?
            $(elementClassName).insertAdjacentElement(insertMode, contentHTMLElement.cloneNode(true)) :
            $(elementClassName).insertAdjacentElement(insertMode, contentHTMLElement)) :
        $(elementClassName).insertAdjacentHTML(insertMode, contentHTMLElement)
}
