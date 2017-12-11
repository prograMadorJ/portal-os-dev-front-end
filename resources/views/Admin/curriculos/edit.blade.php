@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar curriculo: #'.$curriculo->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/curriculos') }}" class="btn btn-default"><span class="icon icon-signal"></span> Todos as curriculos</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do curriculo</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($curriculo, ['method' => 'patch', 'url' => '/site-admin/curriculos/'.$curriculo->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.curriculos._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
