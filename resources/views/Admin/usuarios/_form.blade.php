<div class="control-group">
		<label class="control-label">Nome :</label>
		<div class="controls">
			{{ Form::text('name', null, ['class' => "span11", 'placeholder' => 'Digite um nome']) }}
		</div>
</div>
<div class="control-group">
		<label class="control-label">E-mail :</label>
		<div class="controls">
			{{ Form::email('email', null, ['class' => 'span11', 'placeholder' => 'Digite um e-mail']) }}
		</div>
</div>
<div class="control-group">
		<label class="control-label">Senha :</label>
		<div class="controls">
			{{ Form::password('password', ['class' => 'span11', 'placeholder' => 'Digite uma senha']) }}
		</div>
</div>
<div class="control-group">
		<label class="control-label">Confirmação de senha :</label>
		<div class="controls">
			{{ Form::password('password_confirmation', ['class' => 'span11', 'placeholder' => 'Confirme sua senha']) }}
		</div>
</div>
<div class="control-group">
		<label class="control-label">Grupo :</label>
		<div class="controls">
			{{ Form::select('grupo_id', $grupos, null, ['placeholder' => 'Escolha um grupo']) }}
  	</div>
</div>

<div class="form-actions">
		{{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>