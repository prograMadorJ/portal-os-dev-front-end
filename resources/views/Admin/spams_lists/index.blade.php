@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'SpamsLists de Usuários')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('SpamsList', 'create'))
			<br/>
			<a href="{{ url("/site-admin/spams_lists/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>SpamsLists</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th width="5%">#ID</th>
	                  		<th width="80%">Domínio</th>
	                  		<th width="15%">Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($spams_lists as $spams_list)
		                	<tr class="gradeX">
		                  		<td>{{ $spams_list->id }}</td>
		                  		<td>{{ $spams_list->domain }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/spams_lists/'.$spams_list->id]) }}

	                  				@if (Auth::user()->pode('SpamsList', 'show'))
	                  					<a href="{{ url('/site-admin/spams_lists/'.$spams_list->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

	                  				@if (Auth::user()->pode('SpamsList', 'edit'))
	                  					<a href="{{ url('/site-admin/spams_lists/'.$spams_list->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('SpamsList', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="4">Nenhum SPAM cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $spams_lists->links() }}</div>

	</div>

@endsection
