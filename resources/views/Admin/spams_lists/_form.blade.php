<div class="control-group">
    <label class="control-label">Domínio :</label>
    <div class="controls">
        {{ Form::text('domain', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="form-actions">
    {{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>
