    /*
        declaração de variaveis
     */
    var
        forms = {};

    /*
        Função para validar teclas padrão
     */
    function defaultAllowKeys(key) {
        return key === 8 || // backspace key
            key === 9 || // tab key
            key === 32 || // space key
            (key >= 37 && key <= 40) || // arrow keys
            key === 46 // del key
    }

    /*
         Função validar uma tecla como digito numerico
     */
    function isDigit(key) {
        return (key >= 96 && key <= 111) || String.fromCharCode(key).match(/\d/g) !== null;
    }

    /*
         Função validar uma tecla como letra
     */
    function isLetter(key) {
        return String.fromCharCode(key).match(/[A-Za-z]/g) !== null;
    }

    /*
         Função para aplicar mascara em campos de formularios
     */
    function setMask(element, funcMask) {
        setTimeout(function () {
            element.value = funcMask(element.value);
        }, 1);
    }

    /*
        Função permitir entrada somente texto em campos de formulários
     */
    forms.textField = function (textField) {
        $.event(textField, 'keydown', function (e) {
            var allowKeys = defaultAllowKeys(e.keyCode) || (isLetter(e.keyCode) && !isDigit(e.keyCode));
            if (!allowKeys) e.preventDefault(); // se tecla não for permitida bloqueia evento
        });
    }
    /*
        Função para aplicar mascara a campos tipo telefone
     */
    forms.phoneField = function (phoneField) {
        $.event(phoneField, 'keydown', function (e) {
            var allowKeys = defaultAllowKeys(e.keyCode) || isDigit(e.keyCode);
            if ($(phoneField).selectionStart < 4 || $(phoneField).selectionStart > 5) {  // teste necessário no momento de edição com uso de backspace
                if (allowKeys) {                                               // verifica se a tecla é permitida neste campo
                    var maskPhone = function (digit) {
                        digit = digit.replace(/\D/g, "");                  // Remove tudo o que não é dígito
                        digit = digit.replace(/^(\d)/, "($1");             // Coloca parêntese em volta do primeiro dígito
                        digit = digit.replace(/(\d)(\d)/, "$1$2) ");       // Coloca parêntese em volta do segundo dígito
                        digit = digit.replace(/(\d{4})(\d{4})$/, "$1-$2"); // Coloca hífen entre o quarto e o quinto dígitos
                        digit = digit.replace(/(\d{5})(\d{4})$/, "$1-$2"); // Coloca hífen entre o quinto e o sexto dígitos
                        return digit;
                    };
                    setMask(this, maskPhone); // usa função para aplicar mascara
                }
                else
                    e.preventDefault(); // se a tecla não for permitida bloqueia evento
            }
        });
    }
    /*
        Função para aplicar mascara a campos tipo cidade com sigla do estado após um hífen
     */
    forms.cityStateField = function (cityField) {
        $.event(cityField, 'keydown', function (e) {
            var allowKeys = (e.keyCode === 189) // 189 = key code hífen '-'
                || (defaultAllowKeys(e.keyCode)
                    || (isLetter(e.keyCode) && !isDigit(e.keyCode)));
            if (!allowKeys) e.preventDefault(); // se tecla não for permitida bloqueia evento
        });
    }
}