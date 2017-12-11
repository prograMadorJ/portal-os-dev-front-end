@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Grupos de Usuários')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('Grupo', 'create'))
			<br/>
			<a href="{{ url("/site-admin/grupos/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Grupos</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Nome</th>
	                  		<th>Status</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($grupos as $grupo)
		                	<tr class="gradeX">
		                  		<td>{{ $grupo->id }}</td>
		                  		<td>{{ $grupo->nome }}</td>
		                  		<td>{{ $grupo->status }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/grupos/'.$grupo->id]) }}

	                  				@if (Auth::user()->pode('Grupo', 'show'))
	                  					<a href="{{ url('/site-admin/grupos/'.$grupo->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

	                  				@if (Auth::user()->pode('Grupo', 'edit'))
	                  					<a href="{{ url('/site-admin/grupos/'.$grupo->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('Grupo', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="4">Nenhum grupo cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $grupos->links() }}</div>

	</div>

@endsection
