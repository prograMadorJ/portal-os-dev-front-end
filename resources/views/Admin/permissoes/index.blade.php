@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Permissões de Usuários')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('Permissao', 'create'))
			<br/>
			<a href="{{ url("/site-admin/permissoes/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Permissaos</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Controller</th>
	                  		<th>Status</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($permissoes as $permissao)
		                	<tr class="gradeX">
		                  		<td>{{ $permissao->id }}</td>
		                  		<td>{{ $permissao->controlador }}</td>
		                  		<td>{{ $permissao->status }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/permissoes/'.$permissao->id]) }}

	                  				@if (Auth::user()->pode('Permissao', 'show'))
	                  					<a href="{{ url('/site-admin/permissoes/'.$permissao->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

	                  				@if (Auth::user()->pode('Permissao', 'edit'))
	                  					<a href="{{ url('/site-admin/permissoes/'.$permissao->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('Permissao', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="5">Nenhum permissão cadastrada.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $permissoes->links() }}</div>

	</div>

@endsection
