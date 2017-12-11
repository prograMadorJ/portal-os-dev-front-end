@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Categoria', 'create'))
			<br/>
			<a href="{{ url("/site-admin/categorias/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Categoria</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Nome</th>
	                  		<th>Categoria pai</th>
	                  		<th>Data Criação</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($categorias as $categoria)
		                	<tr class="gradeX">
		                  		<td>{{ $categoria->id }}</td>
		                  		<td>{{ $categoria->nome }}</td>
		                  		<td>{{ $categoria->categoria ? $categoria->categoria->nome : '-' }}</td>
		                  		<td>{{ $categoria->created_at }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('Categoria', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/categorias/'.$categoria->id]) }}
		                  			@endif
		                  				@if (Auth::user()->pode('Categoria', 'show'))
		                  					<a href="{{ url('/site-admin/categorias/'.$categoria->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
		                  				@endif
		                  				@if (Auth::user()->pode('Categoria', 'edit'))
		                  					<a href="{{ url('/site-admin/categorias/'.$categoria->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		                  				@endif
	                  					@if (Auth::user()->pode('Categoria', 'destroy'))
	                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir a categoria?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
		                  					{{ Form::close() }}
		                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="5">Nenhuma categoria cadastrada.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $categorias->links() }}</div>

    </div>

@endsection
