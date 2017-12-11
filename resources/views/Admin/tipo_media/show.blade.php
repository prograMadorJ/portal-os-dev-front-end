@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do Tipo Media')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/tipo_media') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Tipo Media</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Grupo</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered table-striped">
	              	<thead>
	                	<tr>
	                  		<th>Atributos</th>
	                  		<th>Valor</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	                	<tr class="odd gradeX">
	                  		<td>#ID</td>
	                  		<td>{{ $tipo_media->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Nome</td>
	                  		<td>{{ $tipo_media->descricao }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $tipo_media->status == 1 ? 'Ativo' : 'Inativo' }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Grupo', 'edit'))
			<a href="{{ url('/site-admin/tipo_media/'.$tipo_media->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
