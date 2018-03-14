
$.clickToggle = function (elementClassName) {
        if($.hasAttribute(elementClassName,'clicked')) {
            $.removeAttribute(elementClassName,'clicked');
        } else
            $.addAttribute(elementClassName,'clicked');
}