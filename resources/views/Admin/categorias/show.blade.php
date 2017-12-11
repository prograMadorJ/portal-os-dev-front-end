@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do usuário')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/categorias') }}" class="btn btn-default"><span class="icon icon-list"></span> Todos as categorias</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Categoria</h5>
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
	                  		<td>{{ $categoria->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Nome</td>
	                  		<td>{{ $categoria->nome }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Descrição</td>
	                  		<td><?php echo $categoria->descricao; ?></td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Categoria pai</td>
	                  		<td>{{ $categoria->categoria ? $categoria->categoria->nome : '-' }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Categorias filhas</td>
	                  		<td>
	                  			<ul>
	                  				@foreach($categoria->categorias as $filha)
	                  					<li>{{ $filha->nome }}</li>
	                  				@endforeach
	                  			</ul>
	                  		</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>URL amigável</td>
	                  		<td>{{ $categoria->url }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Título do link</td>
	                  		<td>{{ $categoria->link_titulo }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $categoria->status }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Categoria', 'edit'))
			<a href="{{ url('/site-admin/categorias/'.$categoria->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
