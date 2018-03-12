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
HttpRequest.post = function (url, content, funcResponse) {
    axios.post(url, content)
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
    função retorna o valor de um atributo do elemento
    passando o nome do elemento por parametro 'elementClassName'
    e o nome do atributo a ser buscado por parametro 'attributeName'
 */
$.getAttribute = function (elementClassName,attributeName) {
    return $(elementClassName).getAttribute(attributeName);
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
/*
    função modifica o atributo style do elemento
    passando o nome da classe ou ID do elemento alvo por parametro 'elementClassName'
    e passando um texto css em linha por parametro 'styleCSS'
 */
$.css = function (elementClassName, styleCSS) {
    $(elementClassName).setAttribute('style', styleCSS);
}
/*
    função modifica o atributo style de todos os elementos
    passando o nome da classe ou ID do elemento alvo por parametro 'elementClassName'
    e passando um texto css em linha por parametro 'styleCSS'
 */
$.css.all = function (elementClassName, contentHTMLElement) {
    $.all(elementClassName).forEach(function (e) {
        $.css(e, styleCSS);
    });
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
    função reseta o atributo style de todos os elementos
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName'
 */
$.resetCSS.all = function (elementClassName) {
    $.all(elementClassName).forEach(function (e) {
        $.replaceAll(e);
    });
}
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
/*
    função adiciona uma classe ao atributo class do elemento
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName' e o nome da classe a ser adicionada
    por parametro 'className'
 */
$.addClass = function (elementClassName, className) {
    $(elementClassName).classList.add(className);
}
/*
    função adiciona uma classe ao atributo class de todos os elementos
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName' e o nome da classe a ser adicionada
    por parametro 'className'
 */
$.addClass.all = function (elementClassName, className) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.addClass);
}
/*
    função remove uma classe do atributo class do elemento
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName' e o nome da classe a ser removida
    por parametro 'className'
 */
$.removeClass = function (elementClassName, className) {
    $(elementClassName).classList.remove(className);
}
/*
    função remove uma classe do atributo class de todos os elementos
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName' e o nome da classe a ser removida
    por parametro 'className'
 */
$.removeClass.all = function (elementClassName, className) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.removeClass);
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
    função remove o atributo class de todos os elementos
    passando o nome da classe ou ID do elemento alvo
    por paramentro 'elementClassName'
 */
$.removeAllClass.all = function (elementClassName, className) {
    $._applyEach($.all(elementClassName), contentHTMLElement, $.removeAllClass);
}
/*
    função inclui uma copia do elemento HTML para dentro de outro
    após o ultimo elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.append = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'beforeend', 'copy');
}
/*
    função substitui todos os elementos filhos passando o nome
    do elemento pai por parametro 'elementClassName'
    e o conteudo ou elemento substituto por parametro 'contentHTMlElement'
 */
$.replaceAll = function (elementClassName, contentHTMLElement) {
    $(elementClassName).innerHTML = contentHTMLElement;
}

