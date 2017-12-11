<div class="control-group">
	<label class="control-label">Origem :</label>
	<div class="controls">
		{{ Form::text('origem', null, ['class' => 'span11', 'placeholder' => 'Digite a URL de Origem']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Destino :</label>
	<div class="controls">
		{{ Form::text('destino', null, ['class' => 'span11', 'placeholder' => 'Digite a URL de Destino']) }}
	</div>
</div>
<div class="form-actions">
	{{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>
