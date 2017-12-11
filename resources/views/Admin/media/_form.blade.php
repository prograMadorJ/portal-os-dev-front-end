<div class="control-group">
	<label class="control-label">Arquivo :</label>
	<div class="controls">
		@if (isset($media))
			@if ($media->tipo_media_id == 1)
				<p>
					<img src="{{ $media->arquivo() }}" style="width:256px;">
				</p>
			@endif
		@endif
		{{ Form::file('arquivo', ['class' => 'span5']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Título :</label>
	<div class="controls">
		{{ Form::text('titulo', null, ['class' => "span11", 'placeholder' => 'Digite um título']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Descrição :</label>
	<div class="controls">
		{{ Form::text('descricao', null, ['class' => 'span11', 'palceholder' => 'Digite uma descrição']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Tipo da Media :</label>
	<div class="controls">
		{{ Form::select('tipo_media_id', $tipo_media, null, ['class' => 'span5', 'placeholder' => 'Escolha um tipo']) }}
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
				<h5>Media derivadas</h5>
			</div>

			<div id="media_derivatives" class="widget-content">
				@if (isset($media))
					@foreach ($media->media_derivatives as $md)
						@include('Admin.media_derivatives._form')
					@endforeach
				@else
					@include('Admin.media_derivatives._form')
				@endif
			</div>

			<div class="widget-content">
				<button type="button" class="btn btn-info" id="btn-add">Adicionar nova media</button>
			</div>

		</div>
  	</div>
</div>

@section('js-1')
	<script type="text/javascript">
		$("#btn-add").click(function() {
			$.ajax ({
				url: '/site-admin/media/media_derivatives/create',
				method: 'GET',
				success: function(data) {
					$('#media_derivatives').append(data);
				}
			});
		});

		$(document).on('click', '#btn-remove', function() {
			var id = $(this).data('id');
			console.log(id);
			$.ajax({
				url: '/site-admin/media/media_derivatives/'+id+'/destroy',
				method: 'GET',
				success: function(data) {
					$('#media'+id).fadeOut();
				}
			});
		});
	</script>
@endsection
