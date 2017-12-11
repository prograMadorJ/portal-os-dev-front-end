@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Adicionar uma nova media')

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/media') }}" class="btn btn-default"><span class="icon icon-camera"></span> Todas as Media</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações da Media</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::open(['method' => 'post', 'url' => '/site-admin/media', 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.media._form')
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Salvar</button>
					</div>
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
