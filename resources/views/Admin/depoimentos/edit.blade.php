@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar depoimento: #'.$depoimento->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/depoimentos') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Depoimentos</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do depoimento</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($depoimento, ['method' => 'patch', 'url' => '/site-admin/depoimentos/'.$depoimento->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.depoimentos._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
