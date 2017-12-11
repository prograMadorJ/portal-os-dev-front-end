@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do destaque')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/destaques') }}" class="btn btn-default"><span class="icon icon-bullhorn"></span> Todos os destaques</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Destaque</h5>
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
	                  		<td>{{ $destaque->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Indice</td>
	                  		<td>{{ $destaque->indice }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Artigo</td>
	                  		<td>{{ $destaque->artigo ? $destaque->artigo->titulo : '-' }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $destaque->status }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Destaque', 'edit'))
			<a href="{{ url('/site-admin/destaques/'.$destaque->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
