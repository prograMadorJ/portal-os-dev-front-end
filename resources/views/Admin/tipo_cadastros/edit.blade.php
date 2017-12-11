@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar tipo do cadastro: #'.$tipo_cadastro->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/tipo_cadastros') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Tipos de Cadastros</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do Tipo Cadastro</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($tipo_cadastro, ['method' => 'patch', 'url' => '/site-admin/tipo_cadastros/'.$tipo_cadastro->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.tipo_cadastros._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
