<div class="control-group">
	<label class="control-label">Indice :</label>
	<div class="controls">
		{{ Form::number('indice', null, ['class' => "span11", 'placeholder' => 'Digite o indice']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Artigo :</label>
	<div id="artigos" class="controls">
		@include('Admin.destaques._artigos')
	</div>
</div>
<div class="control-group text-center">
	<a id="btn-mais-artigos" class="btn btn-info" data-total="{{ $total_artigos }}" data-more="4">Mais artigos</a>
</div>
<div class="control-group">
	<label class="control-label">Data de agendamento :</label>
	<div class="controls">
		{{ Form::input('datetime-local', 'agendado', $destaque ? date('Y-m-d\TH:i:s', strtotime($destaque)) : null, ['class' => "span11"]) }}
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

@section('js-1')
	<script type="text/javascript">
		$('#btn-mais-artigos').click(function() {
			var num = $(this).data('more');
			$.ajax({
				url: '/site-admin/destaques/artigos/' + num,
				method: 'GET',
				success: function(html) {
					$('#artigos').append(html);
				}
			});
			num += 4;
			$(this).data('more', num);
			if (num > $(this).data('total')) {
				$(this).hide();
			}
		});
	</script>
@endsection
