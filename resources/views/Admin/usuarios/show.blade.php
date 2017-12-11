@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do usuário')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/usuarios') }}" class="btn btn-default"><span class="icon icon-user"></span> Todos os Usuários</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Usuário</h5>
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
	                  		<td>{{ $usuario->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Nome</td>
	                  		<td>{{ $usuario->name }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>E-mail</td>
	                  		<td>{{ $usuario->email }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Grupo</td>
	                  		<td>{{ $usuario->grupo->nome }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $usuario->status }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Usuario', 'edit'))
			<a href="{{ url('/site-admin/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
