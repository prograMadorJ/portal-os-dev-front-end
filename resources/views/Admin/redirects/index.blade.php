@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Redirect', 'create'))
			<br/>
			<a href="{{ url("/site-admin/redirects/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Redirects</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Origem</th>
	                  		<th>Destino</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($redirects as $redirect)
		                	<tr class="gradeX">
		                  		<td>{{ $redirect->id }}</td>
		                  		<td>{{ $redirect->origem }}</td>
		                  		<td>{{ $redirect->destino }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('Redirect', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/redirects/'.$redirect->id]) }}
		                  			@endif
	                  				@if (Auth::user()->pode('Redirect', 'show'))
	                  					<a href="{{ url('/site-admin/redirects/'.$redirect->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif
	                  				@if (Auth::user()->pode('Redirect', 'edit'))
	                  					<a href="{{ url('/site-admin/redirects/'.$redirect->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif
                  					@if (Auth::user()->pode('Redirect', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
	                  					{{ Form::close() }}
	                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="6">Nenhum redirect cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $redirects->links() }}</div>

    </div>

@endsection
