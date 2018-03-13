/*
    função inclui/adiciona um conteudo ou elemento em posição precedente a outro elemento
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será precedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.after = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'afterend', 'copy');
}
/*
    função inclui/adiciona um conteudo ou elemento em posição precedente a todos os outros elementos
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será precedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.after.all = function (elementClassName, contentHTMLElement) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.after);
}
/*
    função move/recorta um conteudo ou elemento para uma posição precedente a outro elemento
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será precedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.afterTo = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'afterend');
}
/*
    função move/recorta um conteudo ou elemento para uma posição precedente a todos os outros elementos
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será precedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.afterTo.all = function (elementClassName, contentHTMLElement) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.afterTo);
}