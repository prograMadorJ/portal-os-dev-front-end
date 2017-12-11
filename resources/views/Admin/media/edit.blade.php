@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar a media: #'.$media->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/media') }}" class="btn btn-default"><span class="icon icon-camera"></span> Todas as Media</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações da media</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($media, ['method' => 'patch', 'url' => '/site-admin/media/'.$media->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.media._form')
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Atualizar</button>
					</div>
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
