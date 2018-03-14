/*
    função obtem a referencia de um link url de ambos atributos 'href' ou 'route' de um elemento
    passando o nome do elemento por parametro 'elementClassName'
 */
$.route = function(elementClassName) {
    var href = $(elementClassName).getAttribute('href');
    return (href !== null && href.includes('http://')) ? href : $(elementClassName).getAttribute('route');
}
