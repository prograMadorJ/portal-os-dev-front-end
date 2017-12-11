@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do redirect')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/redirects') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Redirects</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Redirect</h5>
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
	                  		<td>{{ $redirect->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Nome</td>
	                  		<td>{{ $redirect->origem }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>E-mail</td>
	                  		<td>{{ $redirect->destino }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Redirect', 'edit'))
			<a href="{{ url('/site-admin/redirects/'.$redirect->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
