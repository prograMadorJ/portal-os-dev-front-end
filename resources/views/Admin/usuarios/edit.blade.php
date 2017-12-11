@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar usuário: #'.$usuario->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/usuarios') }}" class="btn btn-default"><span class="icon icon-user"></span> Todos os Usuários</a>
		</p>
		
		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do Usuário</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($usuario, ['method' => 'patch', 'url' => '/site-admin/usuarios/'.$usuario->id, 'class' => 'form-horizontal']) }}
                	@include('Admin.usuarios._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
