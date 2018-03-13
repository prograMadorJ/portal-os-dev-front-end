/*
    função inclui uma copia do elemento HTML para dentro de outro
    antes do primeiro elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.prepend = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'afterbegin', 'copy');
}
/*
    função inclui uma copia do elemento HTML para dentro de todos os outros
    antes do primeiro elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.prepend.all = function (elementClassName, contentHTMLElement) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.prepend);
}
/*
    função move/recorta um elemento HTML para dentro de outro
    antes do primeiro elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.prependTo = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'afterbegin');
}
/*
    função move/recorta um elemento HTML para dentro de todos os outros
    antes do primeiro elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.prependTo.all = function (elementClassName, contentHTMLElement) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.prependTo);
}