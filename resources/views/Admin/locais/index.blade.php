@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Locais de Usuários')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('Local', 'create'))
			<a href="{{ url("/site-admin/locais/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Locais</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Descrição</th>
												<th>Nome</th>
	                  		<th>Status</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($locais as $local)
		                	<tr class="gradeX">
		                  		<td>{{ $local->id }}</td>
		                  		<td>{{ $local->descricao }}</td>
													<td>{{ $local->name }}</td>
		                  		<td>{{ $local->status == 1 ? 'Ativo' : 'Inativo' }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/locais/'.$local->id]) }}

	                  				@if (Auth::user()->pode('Local', 'show'))
	                  					<a href="{{ url('/site-admin/locais/'.$local->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

	                  				@if (Auth::user()->pode('Local', 'edit'))
	                  					<a href="{{ url('/site-admin/locais/'.$local->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('Local', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="4">Nenhum local cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $locais->links() }}</div>

	</div>

@endsection
