<div class="control-group">
	<label class="control-label">Nome :</label>
	<div class="controls">
		{{ Form::text('nome', null, ['class' => 'span11', 'placeholder' => 'Digite o nome']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Telefone :</label>
	<div class="controls">
		{{ Form::text('telefone', null, ['class' => 'span11', 'placeholder' => 'Digite o telefone']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">E-mail :</label>
	<div class="controls">
		{{ Form::email('email', null, ['class' => 'span11', 'placeholder' => 'Digite o e-mail']) }}
  	</div>
</div>
<div class="control-group">
	<label class="control-label">Tipo do Cadastro :</label>
	<div class="controls">
		{{ Form::select('tipo_cadastro_id', $tipo_cadastros, null, ['class' => 'span11', 'placeholder' => 'Selecione o tipo de cadastro']) }}
  	</div>
</div>
<div class="control-group">
	<label class="control-label">IDO do Fonoaudiologo Indicador :</label>
	<div class="controls">
		{{ Form::text('id_fonoaudiologo_indicador', null, ['class' => 'span11', 'placeholder' => 'Digite ID do Fonoaudiologo Indicador']) }}
  	</div>
</div>
<div class="control-group">
	<label class="control-label">Assunto :</label>
	<div class="controls">
		{{ Form::text('assunto', null, ['class' => 'span11', 'placeholder' => 'Digite o assunto']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Mensagem :</label>
	<div class="controls">
		{{ Form::textarea('conteudo', null, ['class' => 'span11', 'placeholder' => 'Digite a mensagem']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Situação :</label>
	<div class="controls">
		{{ Form::radio('status', 1, true) }} Ativo
		{{ Form::radio('status', 0) }} Inativo
  	</div>
</div>
<div class="form-actions">
	{{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>
