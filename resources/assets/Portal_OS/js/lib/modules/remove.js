/*
    função remove todos os elementos filhos passando o nome
    do elemento pai por parametro 'elementClassName'
 */
$.removeAll = function (elementClassName) {
    $.replaceAll(elementClassName,'');
}
/*
    função remove todos os elementos filhos de todos os elementos passando o nome
    do elemento pai por parametro 'elementClassName'
 */
$.removeAll.all = function (elementClassName) {
    $.replaceAll.all(elementClassName,'');
}
/*
    função remove um elemento passando o nome
    do elemento a ser removedo por parametro 'elementClassName'
 */
$.remove = function (elementClassName) {
    $.replace(elementClassName,'');
}
/*
    função remove todos os elementos passando o nome
    do elemento a ser removedo por parametro 'elementClassName'
 */
$.remove.all = function (elementClassName) {
    $.replace.all(elementClassName,'');

}