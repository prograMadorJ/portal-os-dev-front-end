@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar design: #'.$design->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/designs') }}" class="btn btn-default"><span class="icon icon-heart"></span> Todos os Designs</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do design</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($design, ['method' => 'patch', 'url' => '/site-admin/designs/'.$design->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.designs._form')
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Atualizar</button>
					</div>
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
