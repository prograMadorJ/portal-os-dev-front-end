@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar o banner: #'.$banner->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/banners') }}" class="btn btn-default"><span class="icon icon-picture"></span> Todos os Banners</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do banner</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($banner, ['method' => 'patch', 'url' => '/site-admin/banners/'.$banner->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.banners._form')
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Atualizar</button>
					</div>
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
