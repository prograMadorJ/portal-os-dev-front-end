/*
    função obtem a referencia de um link url de ambos atributos 'href' ou 'route' de um elemento
    passando o nome do elemento por parametro 'elementClassName'
 */
$.route = function(elementClassName) {
    var href = $(elementClassName).getAttribute('href')
    var route = $(elementClassName).getAttribute('route');
    function isRoute(route) {
        return (route !== null && (route.includes('http://') || route.includes('https://')));
    }
    if(isRoute(href)) {
        return href;
    }
    else if(isRoute(route)) {
        return route;
    }
    else {
        console.error('core error: missing attributes href or route');
    }

}
