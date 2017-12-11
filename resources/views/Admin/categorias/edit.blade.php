@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar categoria: #'.$categoria->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/categorias') }}" class="btn btn-default"><span class="icon icon-list"></span> Todos as categorias</a>
		</p>
		
		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações da categoria</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($categoria, ['method' => 'patch', 'url' => '/site-admin/categorias/'.$categoria->id, 'class' => 'form-horizontal']) }}
                	@include('Admin.categorias._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
