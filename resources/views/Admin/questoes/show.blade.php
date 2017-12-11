@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes da pergunta')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/questoes') }}" class="btn btn-default"><span class="icon icon-question-sign"></span> Todos as Perguntas Frequentes</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Pergunta Frequente</h5>
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
	                  		<td>{{ $questao->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Pergunta</td>
	                  		<td>{{ $questao->pergunta }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Resposta</td>
	                  		<td>{!! $questao->resposta !!}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $questao->status }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Questao', 'edit'))
			<a href="{{ url('/site-admin/questoes/'.$questao->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
