@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Permissões para Grupos')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('GrupoItemPermissao', 'create'))
			<br/>
			<a href="{{ url("/site-admin/grupos_itens_permissoes/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Permissões para Grupos</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>Grupo</th>
	                  		<th>Permissão</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($grupos_itens_permissoes as $grupo_item_permissao)
		                	<tr class="gradeX">
		                  		<td>{{ $grupo_item_permissao->grupo->nome }}</td>
		                  		<td>{{ $grupo_item_permissao->item_permissao->permissao->controlador }}/{{ $grupo_item_permissao->item_permissao->metodo }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/grupos_itens_permissoes/'.$grupo_item_permissao->grupo_id.'/'.$grupo_item_permissao->item_permissao_id]) }}

                  					@if (Auth::user()->pode('Grupo', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="5">Nenhum permissão de grupo cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $grupos_itens_permissoes->links() }}</div>

	</div>

@endsection
