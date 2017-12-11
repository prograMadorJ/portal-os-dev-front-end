@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Criar novo artigo')

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/artigos') }}" class="btn btn-default"><span class="icon icon-font"></span> Todos os Artigos</a>
		</p>
		
		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do Artigo</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::open(['method' => 'post', 'url' => '/site-admin/artigos', 'class' => 'form-horizontal', 'files' => 'true']) }}
                  @include('Admin.artigos._form')
        		  {{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
