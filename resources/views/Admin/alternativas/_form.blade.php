<div class="control-group">
    <label class="control-label">Título :</label>
    <div class="controls">
        {{ Form::text('titulo', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Observações :</label>
    <div class="controls">
        {{ Form::textarea('observacoes', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Verdadeira :</label>
    <div class="controls">
        {{ Form::radio('verdadeira', 1) }} Sim
        {{ Form::radio('verdadeira', 0, true) }} Não
    </div>
</div>

<div class="control-group">
    <label class="control-label">Peso :</label>
    <div class="controls">
        {{ Form::number('peso', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Ordem :</label>
    <div class="controls">
        {{ Form::number('ordem', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Teste :</label>
    <div class="controls">
        {{ Form::select('pergunta_id', $perguntas, null, ['class' => 'span11', 'placeholder' => 'Selecione a pergunta para esta resposta']) }}
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
