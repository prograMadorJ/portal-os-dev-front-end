<div class="control-group">
	<label class="control-label">Nome :</label>
	<div class="controls">
		{{ Form::text('nome', null, ['class' => "span11", 'placeholder' => 'Digite um título']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Descrição :</label>
	<div class="controls">
		{{ Form::textarea('descricao', null, ['class' => 'textarea_editor  span11', 'placeholder' => 'Escreva seu artigo']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Categoria :</label>
	<div class="controls">
		{{ Form::select('categoria_id', $categorias, null, ['class' => 'span11', 'placeholder' => 'Escolha uma categoria', ]) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">URL amigável :</label>
	<div class="controls">
		{{ Form::text('url', null, ['class' => 'span11']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Título do link :</label>
	<div class="controls">
		{{ Form::text('link_titulo', null, ['class' => 'span11']) }}
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
	<script>
		$('.textarea_editor').summernote();
		$('.modal').hide();
	</script>

@endsection