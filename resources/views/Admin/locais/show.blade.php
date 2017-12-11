@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do local')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/locais') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Locais</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Local</h5>
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
	                  		<td>{{ $local->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Nome</td>
	                  		<td>{{ $local->name }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Descrição</td>
	                  		<td>{{ $local->descricao }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $local->status == 1 ? 'Ativo' : 'Inativo' }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Local', 'edit'))
			<a href="{{ url('/site-admin/locais/'.$local->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
