@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Criar um novo design')

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/designs') }}" class="btn btn-default"><span class="icon icon-heart"></span> Todos os Designs</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do Design</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::open(['method' => 'post', 'url' => '/site-admin/designs', 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.designs._form')
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Salvar</button>
					</div>
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
