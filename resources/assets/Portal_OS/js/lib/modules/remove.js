/*
    função remove todos os elementos filhos passando o nome
    do elemento pai por parametro 'elementClassName'
 */
$.removeAll = function (elementClassName) {
    $(elementClassName).innerHTML = '';
}
/*
    função remove todos os elementos filhos de todos os elementos passando o nome
    do elemento pai por parametro 'elementClassName'
 */
$.removeAll.all = function (elementClassName) {
    $.removeAll(elementClassName);
}
/*
    função remove um elemento passando o nome
    do elemento a ser removedo por parametro 'elementClassName'
 */
$.remove = function (elementClassName) {
    $(elementClassName).parentElement.replaceChild($._toNode(''), $(elementClassName));
}
/*
    função remove todos os elementos passando o nome
    do elemento a ser removedo por parametro 'elementClassName'
 */
$.remove.all = function (elementClassName) {
    $._applyEach($.all(elementClassName), '', $.remove);

}