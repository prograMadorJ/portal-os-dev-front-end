@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Criar nova categoria')

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/categorias') }}" class="btn btn-default"><span class="icon icon-list"></span> Todos as categorias</a>
		</p>
		
		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações da Categoria</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::open(['method' => 'post', 'url' => '/site-admin/categorias', 'class' => 'form-horizontal']) }}
                  @include('Admin.categorias._form')
        		  {{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
