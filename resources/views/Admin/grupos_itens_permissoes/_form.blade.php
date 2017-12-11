<div class="control-group">
    <label class="control-label">Grupos :</label>
    <div class="controls">
        @foreach ($grupos as $grupo)
            <p>
                {{ Form::checkbox('grupo_id[]', $grupo->id) }}
                {{ $grupo->nome }}
            </p>
        @endforeach
    </div>
</div>
<div class="control-group">
    <label class="control-label">Permissões :</label>
    <div class="controls">
        <div class="span5">
            @foreach ($permissoes as $permissao)
                <p>
                    {{ Form::checkbox('permissoes[]', $permissao->id) }}
                    {{ $permissao->controlador }}
                </p>
            @endforeach
        </div>
        <div class="span5">
            <div id="itens_permissoes_id">

            </div>
        </div>
    </div>
</div>

<div class="form-actions">
    {{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>

@section('js-1')
    <script type="text/javascript">
        $('input[type=checkbox]').change(function() {
            $('#itens_permissoes_id').html('');
            $('input[type=checkbox][name="permissoes[]"]:checked').each(function() {
                $.ajax({
                    url: '/site-admin/grupos_itens_permissoes/itens_permissoes/'+$(this).val(),
                    method: 'GET',
                    success: function(data) {
                        $('#itens_permissoes_id').append(data);
                    }
                });
            });
        });
    </script>
@endsection
