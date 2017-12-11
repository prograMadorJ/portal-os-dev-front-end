@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do curriculo')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/curriculos') }}" class="btn btn-default"><span class="icon icon-signal"></span> Todos as curriculos</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Curriculo</h5>
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
	                  		<td>{{ $curriculo->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Nome</td>
	                  		<td>{{ $curriculo->nome }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>E-mail</td>
	                  		<td>{{ $curriculo->email }} </td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Área de interesse</td>
	                  		<td>{{ $curriculo->area_interesse }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Cidade</td>
	                  		<td>{{ $curriculo->cidade }}</td>
	                  	</tr>
						<tr>
							<td>Curriculo</td>
							<td><a href="{{ $curriculo->curriculo }}" download>Baixar aqui</a></td>
						</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Curriculo', 'edit'))
			<a href="{{ url('/site-admin/curriculos/'.$curriculo->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
