@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do item de permissão')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/itens_permissoes') }}" class="btn btn-default"><span class="icon icon-reorder"></span> Todos os itens de permissões</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Item Permissão</h5>
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
	                  		<td>{{ $itemPermissao->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Controlador</td>
	                  		<td>{{ $itemPermissao->permissao->controlador }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Método</td>
	                  		<td>{{ $itemPermissao->metodo }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $itemPermissao->status }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('ItemPermissao', 'edit'))
			<a href="{{ url('/site-admin/itens_permissoes/'.$itemPermissao->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
