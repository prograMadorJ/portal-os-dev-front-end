@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('User', 'create'))
			<br/>
			<a href="{{ url("/site-admin/usuarios/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Usuários</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Nome</th>
	                  		<th>E-mail</th>
	                  		<th>Grupo</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($usuarios as $usuario)
		                	<tr class="gradeX">
		                  		<td>{{ $usuario->id }}</td>
		                  		<td>{{ $usuario->name }}</td>
		                  		<td>{{ $usuario->email }}</td>
		                  		<td>{{ $usuario->grupo_id }}</td>
		                  		<td>
		                  			@if (Auth::user()->id !== $usuario->id)
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/usuarios/'.$usuario->id]) }}
		                  			@endif
		                  				@if (Auth::user()->pode('User', 'show'))
		                  					<a href="{{ url('/site-admin/usuarios/'.$usuario->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
		                  				@endif
		                  				@if (Auth::user()->pode('User', 'edit'))
		                  					<a href="{{ url('/site-admin/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		                  				@endif
		                  				@if (Auth::user()->id !== $usuario->id)
		                  					@if (Auth::user()->pode('User', 'destroy'))
		                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
		                  					@endif

		                  					{{ Form::close() }}
		                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="5">Nenhum usuário cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $usuarios->links() }}</div>

    </div>

@endsection
