@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Design', 'create'))
			<br/>
			<a href="{{ url("/site-admin/designs/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Design</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Produto</th>
	                  		<th>Título</th>
	                  		<th>Status</th>
	                  		<th width="12%">Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($designs as $design)
		                	<tr class="gradeX">
		                  		<td>{{ $design->id }}</td>
		                  		<td>{{ $design->produto->nome }}</td>
		                  		<td>{{ $design->titulo }}</td>
		                  		<td>{{ $design->status == 1 ? 'Ativo' : 'Inativo' }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('Design', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/designs/'.$design->id]) }}
		                  			@endif
		                  				@if (Auth::user()->pode('Design', 'show'))
		                  					<a href="{{ url('/site-admin/designs/'.$design->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
		                  				@endif
		                  				@if (Auth::user()->pode('Design', 'edit'))
		                  					<a href="{{ url('/site-admin/designs/'.$design->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		                  				@endif
                  					@if (Auth::user()->pode('Design', 'destroy'))
                  							<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
	                  					{{ Form::close() }}
	                  				@endif
	                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="4">Nenhum design cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $designs->links() }}</div>

    </div>

@endsection
