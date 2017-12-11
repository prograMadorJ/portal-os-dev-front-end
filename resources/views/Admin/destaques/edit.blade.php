@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar destaque: #'.$destaque->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/destaques') }}" class="btn btn-default"><span class="icon icon-bullhorn"></span> Todos os destaques</a>
		</p>
		
		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do destaque</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($destaque, ['method' => 'patch', 'url' => '/site-admin/destaques/'.$destaque->id, 'class' => 'form-horizontal']) }}
                	@include('Admin.destaques._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
