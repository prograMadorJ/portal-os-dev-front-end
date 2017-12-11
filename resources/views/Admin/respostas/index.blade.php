@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Respostas escolhidas no site')
	<hr/>

	<div class="container-fluid">

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Respostas</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Cliente IP</th>
							<th>Alternativa</th>
							<th>Pergunta</th>
	                  		<th>Teste</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($respostas as $resposta)
		                	<tr class="gradeX">
		                  		<td>{{ $resposta->id }}</td>
		                  		<td>{{ $resposta->cliente_ip }}</td>
								<td>{{ $resposta->alternativa ? $resposta->alternativa->titulo : '-' }}</td>
								<td>{{ $resposta->alternativa ? $resposta->alternativa->pergunta ? $resposta->alternativa->pergunta->titulo : '-' : '-' }}</td>
								<td>{{ $resposta->alternativa ? $resposta->alternativa->pergunta ? $resposta->alternativa->pergunta->teste ? $resposta->alternativa->pergunta->teste->nome : '-' : '-' : '-' }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/respostas/'.$resposta->id]) }}

	                  				@if (Auth::user()->pode('Resposta', 'show'))
	                  					<a href="{{ url('/site-admin/respostas/'.$resposta->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('Resposta', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="6">Nenhuma resposta cadastrada.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $respostas->links() }}</div>

	</div>

@endsection
