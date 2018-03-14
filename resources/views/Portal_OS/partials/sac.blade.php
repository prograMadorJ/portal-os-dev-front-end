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
                   pattern="^([A-Za-zÀ-ú]+){2}( ?[A-Za-zÀ-ú]+)+$" maxlength="50" required autocomplete="off">
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
            <select name="especialidade" id="especialidade" required>
                <option disabled="true" selected="true" value="">
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
            <select name="estado" id="select-estado" route="{{route('extCity')}}" required>
                <option disabled="true" selected="true" value="">
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
            <select name="cidade" id="cidade" class="select-cidade" required>
                <option disabled="true" selected="true" value="">
                    Selecione Sua Cidade
                </option>
            </select>
        </div>

        <div class="form__group">
            <textarea name="comentario" id="comentario" cols="30" rows="3" placeholder="Comentário"></textarea>
        </div>

        <div class="form__group">
            <button type="submit">
                ENVIAR
            </button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $.event('#select-estado', 'change', function() {
           estadoId = document.getElementById("select-estado").value;

           $.replaceAll('.select-cidade','<option value="">CARREGANDO CIDADES...</option>');

           HttpRequest.get('{{ route('extCity') }}?estadoId='+estadoId, function(res){
               $.removeAll('.select-cidade');

               for(i = 0; i < (res.data).length; i++) {
                   opt = '<option value="'+res.data[i].id_cidade+'">'+res.data[i].descricao+'</option>';
                   $.append('.select-cidade', opt);
               }
           });
       });
</script>
