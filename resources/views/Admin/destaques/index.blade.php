@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Destaque', 'create'))
			<br/>
			<a href="{{ url("/site-admin/destaques/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Destaque</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Indice</th>
	                  		<th>Artigo</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($destaques as $destaque)
		                	<tr class="gradeX">
		                  		<td>{{ $destaque->id }}</td>
		                  		<td>{{ $destaque->indice }}</td>
		                  		<td>{{ $destaque->artigo ? $destaque->artigo->titulo : '-' }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('Destaque', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/destaques/'.$destaque->id]) }}
		                  			@endif
		                  				@if (Auth::user()->pode('Destaque', 'show'))
		                  					<a href="{{ url('/site-admin/destaques/'.$destaque->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
		                  				@endif
		                  				@if (Auth::user()->pode('Destaque', 'edit'))
		                  					<a href="{{ url('/site-admin/destaques/'.$destaque->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		                  				@endif
	                  					@if (Auth::user()->pode('Destaque', 'destroy'))
	                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir a destaque?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
		                  					{{ Form::close() }}
		                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="5">Nenhum destaque cadastrada.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $destaques->links() }}</div>

    </div>

@endsection
