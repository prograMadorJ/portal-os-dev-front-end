<div class="sac">
    <div class="sac__title">
        <h1>
            Fale Conosco
        </h1>

        <h3>
            Nós estamos sempre dispostos a te ouvir, escreva sua mensagem!
        </h3>
    </div>

    @if(session('error'))
        <div class="message-error">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="message-success">
            {{ session('success') }}
        </div>
    @endif

    <form class="sac__form" action="{{ route('sendSac') }}" action-xhr="javascript:" method="POST" target="_top">
        {{ csrf_field() }}
        <div class="form__group">
            <input type="text" name="nome" id="nome" placeholder="Nome"
                   pattern="[A-Za-z]+" maxlength="50" required autocomplete="off">
        </div>

        <div class="form__group">
            <input type="text" name="telefone" id="telefone" placeholder="Whatsapp ou Telefone (99)99999-9999"
                   maxlength="15"
                   pattern="^\([1-9]{2}\)\s[0-9]{5}-[0-9]{4}$|^\([1-9]{2}\)\s[0-9]{4}-[0-9]{4}$"
                   required autocomplete="off">
        </div>

        <div class="form__group">
            <input type="email" name="email" id="email" placeholder="E-Mail"
                   maxlength="100" required autocomplete="off">
        </div>

        <div class="form__group">
            <select name="especialidade" id="especialidade">
                <option disabled="true" selected="true">
                    Especialidade
                </option>
                <option>
                    Especialidade UM
                </option>
                <option>
                    Especialidade DOIS
                </option>
            </select>
            <i></i>
        </div>

        <div class="form__group">
            <select name="estado" id="select-estado" required>
                <option disabled="true" selected="true">
                    Selecione Seu Estado
                </option>
                @foreach($estados as $estado)
                    <option name="estado" value="{{ $estado->id_estado }}" id="option-estado">
                        {{ $estado->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form__group">
            <select name="cidade" id="cidade">
                <option disabled="true" selected="true">
                    Selecione Sua Cidade
                </option>

            </select>
        </div>

        <div class="form__group">
            <textarea name="comentario" id="comentario" cols="30" rows="3" placeholder="Comentário"></textarea>
        </div>

        <div class="form__group">
            <button type="submit">
                Quero iniciar
            </button>
        </div>
    </form>
</div>

<script src="{{ asset('/portal-os/js/lib/core.js') }}"></script>
<script type="text/javascript">
    $.event("#select-estado", "change", function() {
        var estadoId = document.getElementById("select-estado").value;
        console.log("VALOR", estadoId);
        HttpRequest.get('{{ route('sac') }}?estadoId='+estadoId, function(res){
            console.log("RES", res);
            console.log("RES.DATA", res.data);
        });
    });

    // function extrairValor() {

    //     HttpRequest.get('{ route('sac') }}?estadoId='+estadoId, function(res) {
    //         console.log(res);
    //     });
    // };

    // HttpRequest.get('{ route('loadMore') }}?limit=6&skip='+skip,function (res) {
    //     if(res.data != "") {
    //         $.append('.blog__main',res.data);
    //     } else {
    //         $.replaceAll('.none',"sem mais artigos para carregar");
    //         $.css('.none', 'pointer-events: none !important; background-color: lightgrey;');
    //     }
    // });
</script>
