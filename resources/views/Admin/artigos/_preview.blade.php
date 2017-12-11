<div id="splash"></div>
<div id="preview">
	<a id="btn-close" class="btn btn-danger">Fechar</a>
	<div class="container">
		<div class="span2">&nbsp;</div>
		<div class="span8">
			<div id="content-preview">	
			</div>	
		</div>
		<div class="span2">&nbsp;</div>
	</div>
</div>

@section('css-2')
	
	<style type="text/css">
		#splash {
			z-index: 99;
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
			background-color: rgba(0,0,0,0.8);
		}

		#btn-close {
			position: fixed;
			top: 0px;
		}

		#preview {
			z-index: 100;
			position: fixed;
			top:0px;
			margin: 0 auto;
			background: #ffffff;
			height: 100%;
			overflow: scroll;
		}

		#content-preview {
			margin-top: 40px !important;
			font-size: 20px !important;
			line-height: 35px !important;
			font-family: Georgia, Arial;
			color: #000000;
		}

		#content-preview h3,
		#content-preview h4,
		#content-preview h5,
		#content-preview h6 {
			font-size: 24px !important;
			font-weight: 600 !important;
		}

		#content-preview b,
		#content-preview strong {
			color: #0072bc !important;
		}

		#content-preview img {
			max-width: 100% !important;
		}

		#content-preview iframe {
			max-width: 100% !important;
		}

	</style>	

@endsection

@section('js-2')

	<script type="text/javascript">
		$('#preview').hide();
		$('#splash').hide();
		
		$('#btn-preview').click(function() {
			const content = $('#txt-conteudo').val();
			$('#content-preview').html(content);
			$('#preview').show();
			$('#splash').show();
		});

		$('#btn-close').click(function() {
			$('#preview').hide();
			$('#splash').hide();
		});

	</script>

@endsection