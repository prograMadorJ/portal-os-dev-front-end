@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Criar uma nova curriculo')

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/curriculos') }}" class="btn btn-default"><span class="icon icon-signal"></span> Todos as curriculos</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações de Curriculo</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::open(['method' => 'post', 'url' => '/site-admin/curriculos', 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.curriculos._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
