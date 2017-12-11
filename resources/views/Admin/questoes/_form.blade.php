<div class="control-group">
    <label class="control-label">Pergunta :</label>
    <div class="controls">
        {{ Form::text('pergunta', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
	<label class="control-label">Resposta :</label>
	<div class="controls">
		{{ Form::textarea('resposta', null, ['class' => 'textarea_editor  span11', 'placeholder' => 'Escreva sua resposta']) }}
	</div>
</div>

<div class="control-group">
    <label class="control-label">Status :</label>
    <div class="controls">
        {{ Form::radio('status', 1, true) }} Ativo
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
