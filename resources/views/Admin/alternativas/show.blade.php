@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do alternativa')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/alternativas') }}" class="btn btn-default"><span class="icon icon-ok-sign"></span> Todas as Alternativas</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Alternativa</h5>
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
	                  		<td>{{ $alternativa->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Título</td>
	                  		<td>{{ $alternativa->titulo }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Verdadeira</td>
	                  		<td>{{ $alternativa->verdadeira }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Peso</td>
	                  		<td>{{ $alternativa->peso }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Ordem</td>
	                  		<td>{{ $alternativa->ordem }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Pergunta</td>
	                  		<td>{{ $alternativa->pergunta ? $alternativa->pergunta->titulo : '-' }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $alternativa->status }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Alternativa', 'edit'))
			<a href="{{ url('/site-admin/alternativas/'.$alternativa->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
