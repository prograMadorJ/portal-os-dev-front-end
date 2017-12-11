@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do pergunta')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/perguntas') }}" class="btn btn-default"><span class="icon icon-group"></span> Todas as Perguntas</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Pergunta</h5>
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
	                  		<td>{{ $pergunta->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Título</td>
	                  		<td>{{ $pergunta->titulo }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Ordem</td>
	                  		<td>{{ $pergunta->ordem }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Imagem</td>
	                  		<td><img src="{{ $pergunta->imagem }}" ></td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Teste</td>
	                  		<td>{{ $pergunta->teste ? $pergunta->teste->nome : '-' }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $pergunta->status }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Pergunta', 'edit'))
			<a href="{{ url('/site-admin/perguntas/'.$pergunta->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
