/*
    função inclui/adiciona um conteudo ou elemento em posição antecedente a outro elemento
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será antecedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.before = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'beforebegin', 'copy');
}
/*
    função inclui/adiciona um conteudo ou elemento em posição antecedente a todos os outros elementos
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será antecedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.before.all = function (elementClassName, contentHTMLElement) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.before);
}
/*
    função move/recorta um conteudo ou elemento para uma posição antecedente a outro elemento
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será antecedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.beforeTo = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'beforebegin');
}
/*
    função move/recorta um conteudo ou elemento para uma posição antecedente a todos os outros elementos
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será antecedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.beforeTo.all = function (elementClassName, contentHTMLElement) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.beforeTo);
}