/*
    função oculta um elemento
    passando o nome do elemento alvo
    por parametro 'elementClassName'
 */
$.hidden = function (elementClassName) {
    $.css(elementClassName, 'display:none !important');
}
/*
    função oculta todos os elementos
    passando o nome do elemento alvo
    por parametro 'elementClassName'
 */
$.hidden.all = function (elementClassName) {
    $.all(elementClassName).forEach(function (e) {
        $.hidden(e);
    });
}
/*
    função exibe um elemento que estava oculto
    passando o nome do elemento alvo
    por parametro 'elementClassName' e preferencialmente
    o tipo do atributo css display por parametro 'displayType'
    caso não use este parametro o valor default é 'flex'
 */
$.show = function (elementClassName, displayType) {
    $.css(elementClassName, 'display:' + (displayType || 'flex'));
}
/*
    função exibe todos os elementos que estavam oculto
    passando o nome do elemento alvo
    por parametro 'elementClassName' e preferencialmente
    o tipo do atributo css display por parametro 'displayType'
    caso não use este parametro o valor default é 'flex'
 */
$.show.all = function (elementClassName, displayType) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.show);
}