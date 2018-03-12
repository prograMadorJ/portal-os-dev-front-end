/*
    função adiciona um atributo ao um elemento
    passando o nome do elemento por parametro 'elementClassName'
    e passando um objeto '{chave:valor}' por parametro 'attributes'
    com o nome por parametro 'name' e o valor por parametro 'value'
 */
$.addAttribute = function (elementClassName, attributes) {
    Object.keys(attributes).map(function (key) {
        $(elementClassName).setAttribute(key,attributes[key]);
    });
}
/*
    função adiciona um atributo a todos os elementos
    passando o nome do elemento por parametro 'elementClassName'
    e passando um objeto '{chave:valor}' por parametro 'attributes'
    com o nome por parametro 'name' e o valor por parametro 'value'
 */
$.addAttribute.all = function (elementClassName, attributes) {
    $._applyEach($.all(elementClassName), attributes, $.addAttribute);
}
/*
    função retorna o valor de um atributo do elemento
    passando o nome do elemento por parametro 'elementClassName'
    e o nome do atributo a ser buscado por parametro 'attributeName'
 */
$.getAttribute = function (elementClassName,attributeName) {
    return $(elementClassName).getAttribute(attributeName);
}

$.getAttribute.all = function (elementClassName, attributes) {
    $._applyEach($.all(elementClassName), attributes, $.getAttribute);
}

$.hasAttribute = function (elementClassName,attributeName) {
    return $(elementClassName).hasAttribute(attributeName);
}