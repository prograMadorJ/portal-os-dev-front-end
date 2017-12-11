<div class="control-group">
    <label class="control-label">Título :</label>
    <div class="controls">
        {{ Form::text('titulo', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Ordem :</label>
    <div class="controls">
        {{ Form::number('ordem', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Imagem :</label>
    <div class="controls">
        @if (isset($pergunta))
            <p><img src="{{ $pergunta->imagem }}" style="width:256px;"></p>
        @endif
        {{ Form::file('imagem') }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Teste :</label>
    <div class="controls">
        {{ Form::select('teste_id', $testes, null, ['class' => 'span11', 'placeholder' => 'Selecione o teste para esta questão']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Status :</label>
    <div class="controls">
        {{ Form::radio('status', 1, true) }} Ativo
        {{ Form::radio('status', 0) }} Inativo
    </div>
</div>

<div class="form-actions">
    {{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>
