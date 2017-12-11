@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar cadastro: #'.$cadastro->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/cadastros') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Cadastros</a>
		</p>
		
		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do cadastro</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($cadastro, ['method' => 'patch', 'url' => '/site-admin/cadastros/'.$cadastro->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.cadastros._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
