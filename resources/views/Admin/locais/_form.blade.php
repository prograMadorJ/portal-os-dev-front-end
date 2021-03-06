<div class="control-group">
    <label class="control-label">Nome :</label>
    <div class="controls">
        {{ Form::text('name', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Descrição :</label>
    <div class="controls">
        {{ Form::text('descricao', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Status :</label>
    <div class="controls">
        {{ Form::radio('status', 1) }} Ativo
        {{ Form::radio('status', 0, true) }} Inativo
    </div>
</div>

<div class="form-actions">
    {{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>
