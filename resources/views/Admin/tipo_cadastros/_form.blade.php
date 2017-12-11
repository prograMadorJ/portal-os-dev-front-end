<div class="control-group">
	<label class="control-label">Descrição :</label>
	<div class="controls">
		{{ Form::text('descricao', null, ['class' => 'span11', 'placeholder' => 'Digite a descrição']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Situação :</label>
	<div class="controls">
		{{ Form::radio('status', 1) }} Ativo
		{{ Form::radio('status', 0, true) }} Inativo
  	</div>
</div>
<div class="form-actions">
	{{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>
