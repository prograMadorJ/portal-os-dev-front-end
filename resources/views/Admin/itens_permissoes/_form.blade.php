<div class="control-group">
    <label class="control-label">Controlador :</label>
    <div class="controls">
        {{ Form::select('permissao_id', $permissoes, null, ['class' => 'span11', 'placeholder' => 'Selecione um controlador']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Método :</label>
    <div class="controls">
        {{ Form::text('metodo', null, ['class' => 'span11']) }}
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
