@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do tipo de cadastro')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/tipo_cadastros') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Tipos de Cadastros</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Tipo de Cadastro</h5>
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
	                  		<td>{{ $tipo_cadastro->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Descrição</td>
	                  		<td>{{ $tipo_cadastro->descricao }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $tipo_cadastro->status }}</td>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('TipoCadastro', 'edit'))
			<a href="{{ url('/site-admin/tipo_cadastros/'.$tipo_cadastro->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
