<div class="control-group">
	<label class="control-label">Nome :</label>
	<div class="controls">
		{{ Form::text('nome', isset($_GET['nome']) ? $_GET['nome'] : null, ['class' => 'span11', 'placeholder' => 'Digite o nome']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">local :</label>
	<div class="controls">
		{{ Form::text('local', null, ['class' => 'span11', 'placeholder' => 'Digite o local (Cidade/Estado)']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Título :</label>
	<div class="controls">
		{{ Form::text('titulo', null, ['class' => 'span11', 'placeholder' => 'Digite o título']) }}
  	</div>
</div>
<div class="control-group">
	<label class="control-label">Conteúdo :</label>
	<div class="controls">
		{{ Form::textarea('conteudo', isset($_GET['conteudo']) ? $_GET['conteudo'] : null, ['class' => 'span11 textarea_editor', 'placeholder' => 'Digite o conteúdo']) }}
  	</div>
</div>
<div class="control-group">
	<label class="control-label">Ordem :</label>
	<div class="controls">
		{{ Form::number('ordem', null, ['class' => 'span2', 'placeholder' => 'Digite a ordem de exibição']) }}
  	</div>
</div>
<div class="control-group">
	<label class="control-label">Media :</label>
	@php
		$field_name = 'media_id';
		$media_save = isset($depoimento) ? $depoimento->media : null;
	@endphp
	@include('Admin.media._filter')
</div>
<div class="control-group">
	<label class="control-label">Vídeo do Youtube :</label>
	<div class="controls">
		{{ Form::text('youtube_video', null, ['class' => 'span11', 'placeholder' => 'Digite o link do YouTube Vídeo']) }}
  	</div>
</div>
<div class="control-group">
	<label class="control-label">É destaque ?</label>
	<div class="controls">
		{{ Form::radio('destaque', 1, true) }} Sim <br>
		{{ Form::radio('destaque', 0) }} Não
  	</div>
</div>
<div class="control-group">
	<label class="control-label">Situação :</label>
	<div class="controls">
		{{ Form::radio('status', 1, true) }} Ativo <br>
		{{ Form::radio('status', 0) }} Inativo
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
