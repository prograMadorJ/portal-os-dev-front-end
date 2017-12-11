@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Criar um novo redirect')

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/redirects') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Redirects</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do Redirect</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::open(['method' => 'post', 'url' => '/site-admin/redirects', 'class' => 'form-horizontal', 'files' => 'true']) }}
                  @include('Admin.redirects._form')
        		  {{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
