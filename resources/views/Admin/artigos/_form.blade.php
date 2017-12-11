<div class="control-group">
	<label class="control-label">Título :</label>
	<div class="controls">
		{{ Form::text('titulo', null, ['class' => "span11", 'placeholder' => 'Digite um título', 'maxlength' => '50']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Resumo :</label>
	<div class="controls">
		{{ Form::text('resumo', null, ['class' => 'span11', 'placeholder' => 'Escreva um breve resumo do artigo']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Conteúdo :</label>
	<div class="controls">
		{{ Form::textarea('conteudo', null, ['class' => 'textarea_editor  span11', 'placeholder' => 'Escreva seu artigo', 'id' => 'txt-conteudo']) }}
		<br/><p><a id="btn-preview" class="btn btn-info">Pré-visualizar</a></p>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Categoria :</label>
	<div class="controls">
		@foreach ($categorias as $categoria)
			@if (isset($artigo))
				{{ Form::checkbox('categorias[]', $categoria->id, $artigo->categorias->contains($categoria->id)) }} {{ $categoria->nome }}<br/>
			@else
				{{ Form::checkbox('categorias[]', $categoria->id) }} {{ $categoria->nome }}<br/>
			@endif
		@endforeach
	</div>
</div>
<div class="control-group">
	<label class="control-label">Imagem :</label>
	@php
		$field_name = 'media_id';
		$media_save = isset($artigo) ? $artigo->media : null;
	@endphp
	@include('Admin.media._filter')
</div>
<div class="control-group">
	<label class="control-label">URL Amigável :</label>
	<div class="controls">
		{{ Form::text('url', null, ['class' => 'span5', 'placeholder' => 'Escreva a URL amigável. Exemplo: teste-1']) }}
		Título : {{ Form::text('link_titulo', null, ['class' => 'span6', 'placeholder' => 'Título do link']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Data de publicação :</label>
	<div class="controls">
		{{ Form::input('datetime-local', 'publicacao', $artigo ? date('Y-m-d\TH:i:s', strtotime($artigo->publicacao)) : null, ['class' => 'span11']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Data de agendamento :</label>
	<div class="controls">
		{{ Form::input('datetime-local', 'agendado', $artigo ? date('Y-m-d\TH:i:s', strtotime($artigo->agendado)) : null, ['class' => 'span11']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Situação :</label>
	<div class="controls">
		{{ Form::radio('status', 1, true) }} Ativo
		{{ Form::radio('status', 0) }} Inativo
  	</div>
</div>

<div class="control-group">
	<div class="controls">
		<div class="span11 widget-box">

			<div class="widget-title">
				<h5>SEO</h5>
			</div>

			<div class="widget-content">
				@include('Admin.seo._form')
			</div>

		</div>
  	</div>
</div>

<div class="form-actions">
	{{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>

@section('css-1')

	{{ Html::style('/admin/summernote/summernote.css') }}

@endsection

@section('js-1')

	{{ Html::script('/admin/summernote/summernote.js') }}
	{{ html::script('/admin/summernote/lang/summernote-pt-BR.js') }}
	<script type="text/javascript">
		$('.textarea_editor').summernote();
		$('.modal').hide();
		$('.datepicker').datepicker();
	</script>

@endsection

@include('Admin.artigos._preview')
