<div class="control-group">
	<label class="control-label">Meta título :</label>
	<div class="controls">
		{{ Form::text('seo[meta_titulo]', null, ['class' => "span8 txt-seo",
			'placeholder' => 'Digite um título',
			'maxlength' => '74',
			'required' => 'true',
			'data-id' => 'meta_titulo'
		]) }}
		<span id="meta_titulo"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Meta descrição :</label>
	<div class="controls">
		{{ Form::text('seo[meta_descricao]', null, ['class' => "span8 txt-seo",
			'placeholder' => 'Digite uma descrição',
			'maxlength' => '156',
			'required' => 'true',
			'data-id' => 'meta_descricao',
			]) }}
		<span id="meta_descricao"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Título facebook :</label>
	<div class="controls">
		{{ Form::text('seo[fb_titulo]', null, ['class' => "span8 txt-seo",
			'placeholder' => 'Digite um título',
			'maxlength' => '80',
			'data-id' => 'fb_titulo'
		]) }}
		<span id="fb_titulo"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Descrição facebook :</label>
	<div class="controls">
		{{ Form::text('seo[fb_descricao]', null, ['class' => "span8 txt-seo",
			'placeholder' => 'Digite uma descrição',
			'maxlength' => '156',
			'data-id' => 'fb_descricao',
		]) }}
		<span id="fb_descricao"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Imagem facebook :</label>
	<div class="controls">
		{{ Form::text('seo[fb_imagem]', null, ['class' => "span8", 'placeholder' => 'Adicione o link da imagem']) }}
	</div>
</div>
<div class="control-group">
	<label class="control-label">Twett :</label>
	<div class="controls">
		{{ Form::text('seo[tweet]', null, ['class' => "span8 txt-seo",
			 'placeholder' => 'Faça seu tweet',
			 'maxlength' => '144',
			 'data-id' => 'tweet'
		]) }}
		<span id="tweet"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Título twitter :</label>
	<div class="controls">
		{{ Form::text('seo[tw_titulo]', null, ['class' => "span8",
			'placeholder' => 'Digite um título',
			'maxlength' => '100',
			'data-id' => 'tw_titulo'
		]) }}
		<span id="tw_titulo"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Descrição twitter :</label>
	<div class="controls">
		{{ Form::text('seo[tw_descricao]', null, ['class' => "span8 txt-seo",
			'placeholder' => 'Digite uma descrição',
			'maxlength' => '144',
			'data-id' => 'tw_descricao',
		]) }}
		<span id="tw_descricao"></span>
	</div>
</div>
<div class="control-group">
	<label class="control-label">Imagem twitter :</label>
	<div class="controls">
		{{ Form::text('seo[tw_imagem]', null, ['class' => "span8", 'placeholder' => 'Adicione o link da imagem']) }}
	</div>
</div>

@section('js-3')
	<script type="text/javascript">
		function count_caracters(obj, label, min, total) {
			var length = obj.val().length;
			var label = $("#"+label);
			if (length >= min && length <= total) {
				label.removeClass();
				label.addClass('label label-success');
			} else if (length <= min && length >= (total*0.7)) {
				label.removeClass();
				label.addClass('label label-warning');
			} else {
				label.removeClass();
				label.addClass('label label-important');
			}
			label.html(length);
		}

		$(".txt-seo").keyup(function() {
			count_caracters($(this), $(this).data('id'), ($(this).attr('maxlength') - 15), $(this).attr('maxlength'));
		});

		count_caracters($("input[name='seo[meta_titulo]']"), 'meta_titulo', (74-15), 74);
		count_caracters($("input[name='seo[meta_descricao]']"), 'meta_descricao', (156-15), 156);
		count_caracters($("input[name='seo[fb_titulo]']"), 'fb_titulo', (80-15), 80);
		count_caracters($("input[name='seo[fb_descricao]']"), 'fb_descricao', (156-15), 156);
		count_caracters($("input[name='seo[tweet]']"), 'tweet', (156-15), 144);
		count_caracters($("input[name='seo[tw_titulo]']"), 'tw_titulo', (100-15), 100);
		count_caracters($("input[name='seo[tw_descricao]']"), 'tw_descricao', (144-15), 144);
	</script>
@endsection
