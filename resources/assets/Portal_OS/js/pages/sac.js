form.textField('#nome');
form.phoneField('#telefone');
$.event('#select-estado', 'change', function() {
    estadoId = $("#select-estado").value;

    HttpRequest.get($.route('#select-estado')+'?estadoId='+estadoId, function(res){
        $.removeAll('.select-cidade');

        for(i = 0; i < (res.data).length; i++) {
            opt = '<option value="'+res.data[i].id_cidade+'">'+res.data[i].descricao+'</option>';
            $.append('.select-cidade', opt);
        }
    });
});