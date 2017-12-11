@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Permissões de Usuários')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('ItemPermissao', 'create'))
			<br/>
			<a href="{{ url("/site-admin/itens_permissoes/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Itens Permissões</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
							<th>Controlador</th>
	                  		<th>Método</th>
	                  		<th>Status</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($itens_permissoes as $item)
		                	<tr class="gradeX">
		                  		<td>{{ $item->id }}</td>
								<td>{{ $item->permissao->controlador }}</td>
		                  		<td>{{ $item->metodo }}</td>
		                  		<td>{{ $item->status }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/itens_permissoes/'.$item->id]) }}

	                  				@if (Auth::user()->pode('ItemPermissao', 'show'))
	                  					<a href="{{ url('/site-admin/itens_permissoes/'.$item->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

	                  				@if (Auth::user()->pode('ItemPermissao', 'edit'))
	                  					<a href="{{ url('/site-admin/itens_permissoes/'.$item->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('ItemPermissao', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="5">Nenhum item de permissão cadastrada.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $itens_permissoes->links() }}</div>

	</div>

@endsection
