@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Criar um novo depoimento')

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/depoimentos') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Depoimentos</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do Depoimento</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::open(['method' => 'post', 'url' => '/site-admin/depoimentos', 'class' => 'form-horizontal', 'files' => 'true']) }}
                  @include('Admin.depoimentos._form')
        		  {{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
