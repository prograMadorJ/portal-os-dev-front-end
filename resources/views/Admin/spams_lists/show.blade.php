@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do spams_list')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/spams_lists') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os SpamsLists</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>SpamsList</h5>
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
	                  		<td>{{ $spams_list->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Domínio</td>
	                  		<td>{{ $spams_list->domain }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('SpamsList', 'edit'))
			<a href="{{ url('/site-admin/spams_lists/'.$spams_list->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
