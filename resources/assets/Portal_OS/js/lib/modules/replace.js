/*
    função substitui todos os elementos filhos passando o nome
    do elemento pai por parametro 'elementClassName'
    e o conteudo ou elemento substituto por parametro 'contentHTMlElement'
 */
$.replaceAll = function (elementClassName, contentHTMLElement) {
    $(elementClassName).innerHTML = contentHTMLElement;
}
/*
    função substitui todos os elementos filhos de todos os elementos passando o nome
    do elemento pai por parametro 'elementClassName'
    e o conteudo ou elemento substituto por parametro 'contentHTMlElement'
 */
$.replaceAll.all = function (elementClassName, contentHTMLElement) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.replaceAll);
}
/*
    função substitui um elemento passando o nome
    do elemento a ser substituido por parametro 'elementClassName'
    e o conteudo ou elemento substituto por parametro 'contentHTMlElement'
 */
$.replace = function (elementClassName, contentHTMLElement) {
    $(elementClassName).parentElement.replaceChild($._toNode(contentHTMLElement), $(elementClassName));
}
/*
    função substitui todos os elementos passando o nome
    do elemento a ser substituido por parametro 'elementClassName'
    e o conteudo ou elemento substituto por parametro 'contentHTMlElement'
 */
$.replace.all = function (elementClassName, contentHTMLElement) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.replace);

}