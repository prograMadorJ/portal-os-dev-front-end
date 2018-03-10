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
    return ($.isObject(elementClassName)) ?
        elementClassName :
        document.querySelector(elementClassName);
}
/*
     função retorna todos os elementos html através do nome da classe
     ,ID ou o objeto do proprio elemento
 */
$.all = function (elementClassName) {
    return ($.isObject(elementClassName)) ?
        elementClassName :
        document.querySelectorAll(elementClassName);
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
$.isObject = function (element) {
    return (typeof element !== null && typeof element === 'object');
}
/*
    função retorna a converssão de um conteudo ou elemento
    em conteudo ou elemento de tipo filho de um elemento (childNode)
 */
$.toNode = function (contentHTMLElement) {
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
    ($.isObject(contentHTMLElement)) ?
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
        $.css(e,styleCSS);
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
    $.all(elementClassName).forEach(function (e) {
        $.show(e, displayType);
    });
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
    $.all(elementClassName).forEach(function (e) {
        $.addClass(e, className);
    });
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
    $.all(elementClassName).forEach(function (e) {
        $.removeClass(e, className);
    });
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
    $.all(elementClassName).forEach(function (e) {
        $.removeAllClass(e, className);
    });
}
/*
    função inclui uma copia do elemento HTML para dentro de outro
    após o ultimo elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.append = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'beforeend', copy);
}
/*
    função inclui uma copia do elemento HTML para dentro de todos os outros
    após o ultimo elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.append.all = function (elementClassName, contentHTMLElement) {
    $.all(elementClassName).forEach(function (e) {
        $.append(e, contentHTMLElement);
    });
}
/*
    função move/recorta um elemento HTML para dentro de outro
    após o ultimo elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.appendTo = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'beforeend');
}
/*
    função move/recorta um elemento HTML para dentro de todos os outros
    após o ultimo elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.appendTo.all = function (elementClassName, contentHTMLElement) {
    $.all(elementClassName).forEach(function (e) {
        $.appendTo(e, contentHTMLElement);
    });
}
/*
    função inclui uma copia do elemento HTML para dentro de outro
    antes do primeiro elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.prepend = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'afterbegin', copy);
}
/*
    função inclui uma copia do elemento HTML para dentro de todos os outros
    antes do primeiro elemento filho, passando o nome do elemento alvo
    por parametro 'elementClassName' e o conteudo a ser adicionado
    por paramentro 'contentHTMLElement'
 */
$.prepend.all = function (elementClassName, contentHTMLElement) {
    $.all(elementClassName).forEach(function (e) {
        $.prepend(e, contentHTMLElement);
    });
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
    $.all(elementClassName).forEach(function (e) {
        $.prependTo(e, contentHTMLElement);
    });
}
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
    $.all(elementClassName).forEach(function (e) {
        $.replaceAll(e,contentHTMLElement);
    });
}
/*
    função substitui um elemento passando o nome
    do elemento a ser substituido por parametro 'elementClassName'
    e o conteudo ou elemento substituto por parametro 'contentHTMlElement'
 */
$.replace = function (elementClassName, contentHTMLElement) {
    $(elementClassName).parentElement.replaceChild($.toNode(contentHTMLElement), $(elementClassName));
}
/*
    função substitui todos os elementos passando o nome
    do elemento a ser substituido por parametro 'elementClassName'
    e o conteudo ou elemento substituto por parametro 'contentHTMlElement'
 */
$.replace.all = function (elementClassName, contentHTMLElement) {
    $.all(elementClassName).forEach(function (e) {
        $.replace(e,contentHTMLElement);
    });
}
/*
    função inclui/adiciona um conteudo ou elemento em posição antecedente a outro elemento
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será antecedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.before = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'beforebegin', copy);
}
/*
    função inclui/adiciona um conteudo ou elemento em posição antecedente a todos os outros elementos
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será antecedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.before.all = function (elementClassName, contentHTMLElement) {
    $.all(elementClassName).forEach(function (e) {
        $.before(e,contentHTMLElement);
    });
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
    $.all(elementClassName).forEach(function (e) {
        $.beforeTo(e,contentHTMLElement);
    });
}
/*
    função inclui/adiciona um conteudo ou elemento em posição precedente a outro elemento
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será precedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.after = function (elementClassName, contentHTMLElement) {
    $.insert(elementClassName, contentHTMLElement, 'afterend', copy);
}
/*
    função inclui/adiciona um conteudo ou elemento em posição precedente a todos os outros elementos
    passando por parametro 'elementClassName' que é o elemento de referencia ao qual será precedido
    pelo conteudo ou elemento passando por parametro 'contentHTMLElement'
 */
$.after.all = function (elementClassName, contentHTMLElement) {
    $.all(elementClassName).forEach(function (e) {
        $.after(e,contentHTMLElement);
    });
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
    $.all(elementClassName).forEach(function (e) {
        $.afterTo(e,contentHTMLElement);
    });
}