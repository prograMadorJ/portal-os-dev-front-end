<div class="control-group">
	<label class="control-label">Produto :</label>
	<div class="controls">
		{{ Form::select('produto_id', $produtos, null, ['class' => 'span11', 'placeholder' => 'Selecione um produto']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Título :</label>
	<div class="controls">
		{{ Form::text('titulo', null, ['class' => 'span11', 'placeholder' => 'Escreva um título']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Conteúdo :</label>
	<div class="controls">
		{{ Form::textarea('conteudo', null, ['class' => 'span11 textarea_editor', 'placeholder' => 'Escreva o conteúdo']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Imagem :</label>
	@php
		$field_name = 'media_id';
		$media_save = isset($design) ? $design->media : null;
	@endphp
	@include('Admin.media._filter')
</div>
<div class="control-group">
	<label class="control-label">Situação do design :</label>
	<div class="controls">
		{{ Form::radio('status', 1) }} Ativo
		{{ Form::radio('status', 0, true) }} Inativo
  	</div>
</div>

@section('css-1')
	<link rel="stylesheet" href="{{ url('/admin/summernote/summernote.css') }}">
@endsection

@section('js-1')
	<script type="text/javascript" src="{{ url('/admin/summernote/summernote.js') }}"></script>
	<script type="text/javascript" src="{{ url('/admin/summernote/lang/summernote-pt-BR.js') }}"></script>
	<script type="text/javascript">
		$('.textarea_editor').summernote();
		$('.modal').hide();
	</script>
@endsection
