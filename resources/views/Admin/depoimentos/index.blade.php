@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Depoimento', 'create'))
			<br/>
			<a href="{{ url("/site-admin/depoimentos/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
			<a href="{{ url("/site-admin/depoimentos/cadastros") }}" class="btn btn-info"><span class="icon icon-group"></span> Depoimentos Cadastrados</a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Depoimentos</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Nome</th>
	                  		<th>Local</th>
							<th>Título</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($depoimentos as $depoimento)
		                	<tr class="gradeX">
		                  		<td>{{ $depoimento->id }}</td>
		                  		<td>{{ $depoimento->nome }}</td>
		                  		<td>{{ $depoimento->local }}</td>
								<td>{{ $depoimento->titulo }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('Depoimento', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/depoimentos/'.$depoimento->id]) }}
		                  			@endif
	                  				@if (Auth::user()->pode('Depoimento', 'show'))
	                  					<a href="{{ url('/site-admin/depoimentos/'.$depoimento->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif
	                  				@if (Auth::user()->pode('Depoimento', 'edit'))
	                  					<a href="{{ url('/site-admin/depoimentos/'.$depoimento->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif
                  					@if (Auth::user()->pode('Depoimento', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
	                  					{{ Form::close() }}
	                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="5">Nenhum depoimento cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $depoimentos->links() }}</div>

    </div>

@endsection
