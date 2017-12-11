@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Curriculo', 'create'))
			<br/>
			<a href="{{ url("/site-admin/curriculos/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Curriculo</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Nome</th>
	                  		<th>E-mail</th>
	                  		<th>Área de Interesse</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($curriculos as $curriculo)
		                	<tr class="gradeX">
		                  		<td>{{ $curriculo->id }}</td>
		                  		<td>{{ $curriculo->nome }}</td>
		                  		<td>{{ $curriculo->email }}</td>
		                  		<td>{{ $curriculo->area_interesse }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('Curriculo', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/curriculos/'.$curriculo->id]) }}
		                  			@endif
		                  				@if (Auth::user()->pode('Curriculo', 'show'))
		                  					<a href="{{ url('/site-admin/curriculos/'.$curriculo->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
		                  				@endif
		                  				@if (Auth::user()->pode('Curriculo', 'edit'))
		                  					<a href="{{ url('/site-admin/curriculos/'.$curriculo->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		                  				@endif
	                  					@if (Auth::user()->pode('Curriculo', 'destroy'))
	                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
		                  					{{ Form::close() }}
		                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="4">Nenhum curriculo cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $curriculos->links() }}</div>

    </div>

@endsection
