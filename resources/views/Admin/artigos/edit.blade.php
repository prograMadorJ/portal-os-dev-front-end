@extends("layouts.Admin.app")

@section("content")

	@section('h1', 'Editar artigo: #'.$artigo->id)

	<div class="container-fluid">
		<p>
			<a href="{{ url('/site-admin/artigos') }}" class="btn btn-default"><span class="icon icon-font"></span> Todos os Artigos</a>
			<a title="Visualizar sem alterações" target="_blank" href="{{ url('/blog/'. $artigo->url) }}" class="btn btn-info"><span class="icon icon-globe"></span> Visualizar Online</a>
		</p>

		<hr/>

    @include('layouts.Admin._errorForm')

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        		<h5>Informações do artigo</h5>
       		</div>
        	<div class="widget-content nopadding">
          		{{ Form::model($artigo, ['method' => 'patch', 'url' => '/site-admin/artigos/'.$artigo->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                	@include('Admin.artigos._form')
        		{{ Form::close() }}
        	</div>
      	</div>
	</div>

@endsection
