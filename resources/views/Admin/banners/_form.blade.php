<div class="control-group">
	<label class="control-label">Nome :</label>
	<div class="controls">
		{{ Form::text('nome', null, ['class' => 'span11', 'placeholder' => 'Nome para identificar o banner']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Imagem :</label>
	@php
		$field_name = "media_id";
		$media_save = isset($banner) ? $banner->media : null;
	@endphp
	@include('Admin.media._filter')
</div>
<div class="control-group">
	<label class="control-label">Local :</label>
	<div class="controls">
		{{ Form::select('local_id', $local, null, ['class' => 'span11', 'placeholder' => 'Selecione um local para o banner']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Link :</label>
	<div class="controls">
		{{ Form::text('link', null, ['class' => 'span11', 'placeholder' => 'URL de destino para o Banner']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Target :</label>
	<div class="controls">
		{{ Form::select('target', ['_top' => 'Mesma página', '_blank' => 'Nova página'], null, ['class' => 'span11']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Título :</label>
	<div class="controls">
		{{ Form::text('titulo', null, ['class' => "span11", 'placeholder' => 'Digite um título', 'maxlength' => '50']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Subtítulo :</label>
	<div class="controls">
		{{ Form::text('subtitulo', null, ['class' => 'span11', 'placeholder' => 'Escreva um subtítulo do banner']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Botão texto :</label>
	<div class="controls">
		{{ Form::text('botao_texto', null, ['class' => 'span5', 'placeholder' => 'Título do botão']) }}
		Botão Link : {{ Form::text('botao_link', null, ['class' => 'span5', 'placeholder' => 'Link do botão']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Data de início :</label>
	<div class="controls">
		{{ Form::input('datetime-local', 'periodo_inicio', $banner ? date('Y-m-d\TH:i:s', strtotime($banner->periodo_inicio)) : null, ['class' => 'span3']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Data de expiração :</label>
	<div class="controls">
		{{ Form::input('datetime-local', 'periodo_final', $banner ? date('Y-m-d\TH:i:s', strtotime($banner->periodo_final)) : null, ['class' => 'span3']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Indice :</label>
	<div class="controls">
		{{ Form::number('indice', null, ['class' => 'span11']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Situação :</label>
	<div class="controls">
		{{ Form::radio('status', 1, true) }} Ativo
		{{ Form::radio('status', 0) }} Inativo
  	</div>
</div>
