@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do resposta')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/respostas') }}" class="btn btn-default"><span class="icon icon-group"></span> Todas as Respostas</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Resposta</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered table-striped">
	              	<thead>
	                	<tr>
	                  		<th>Atributos</th>
	                  		<th>Valor</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	                	<tr class="odd gradeX">
	                  		<td>#ID</td>
	                  		<td>{{ $resposta->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Cliente IP</td>
	                  		<td>{{ $resposta->cliente_ip }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>HTTP User Agent</td>
	                  		<td>{{ $resposta->http_user_agent }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Cadastro</td>
	                  		<td>{{ $resposta->cadastro ? $resposta->cadastro->nome : 'Desconhecido' }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Alternativa</td>
	                  		<td>{{ $resposta->alternativa ? $resposta->alternativa->titulo : '-' }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Pergunta</td>
	                  		<td>{{ $resposta->alternativa ? $resposta->alternativa->pergunta ? $resposta->alternativa->pergunta->titulo : '-' : '-' }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Teste</td>
	                  		<td>{{ $resposta->alternativa ? $resposta->alternativa->pergunta ? $resposta->alternativa->pergunta->teste ? $resposta->alternativa->pergunta->teste->nome : '-' : '-' : '-' }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

	</div>

@endsection
