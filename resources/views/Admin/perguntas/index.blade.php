@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Perguntas para Teste')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('Pergunta', 'create'))
			<br/>
			<a href="{{ url("/site-admin/perguntas/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Perguntas</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Título</th>
							<th>Teste</th>
							<th>Ordem</th>
	                  		<th>Status</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($perguntas as $pergunta)
		                	<tr class="gradeX">
		                  		<td>{{ $pergunta->id }}</td>
		                  		<td>{{ $pergunta->titulo }}</td>
								<td>{{ $pergunta->teste ? $pergunta->teste->nome : '-' }}</td>
								<td>{{ $pergunta->ordem }}</td>
		                  		<td>{{ $pergunta->status }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/perguntas/'.$pergunta->id]) }}

	                  				@if (Auth::user()->pode('Pergunta', 'show'))
	                  					<a href="{{ url('/site-admin/perguntas/'.$pergunta->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

	                  				@if (Auth::user()->pode('Pergunta', 'edit'))
	                  					<a href="{{ url('/site-admin/perguntas/'.$pergunta->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('Pergunta', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="6">Nenhum pergunta cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $perguntas->links() }}</div>

	</div>

@endsection
