<div class="control-group">
	<label class="control-label">Nome :</label>
	<div class="controls">
		{{ Form::text('nome', null, ['class' => 'span11', 'placeholder' => 'Digite um nome']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">E-mail :</label>
	<div class="controls">
		{{ Form::email('email', null, ['class' => 'span11', 'placeholder' => 'Digite um e-mail']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Cidade :</label>
	<div class="controls">
		{{ Form::text('cidade', null, ['class' => 'span11', 'placeholder' => 'Digite a cidade']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Área de interesse :</label>
	<div class="controls">
		{{ Form::text('area_interesse', null, ['class' => 'span11', 'placeholder' => 'Digite a área de interesse']) }}
  	</div>
</div>
<div class="control-group">
	<label class="control-label">Curriculo :</label>
	<div class="controls">
		{{ Form::file('curriculo') }}
  	</div>
</div>
<div class="form-actions">
	{{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>
