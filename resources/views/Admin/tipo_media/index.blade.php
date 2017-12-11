@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Tipo Media')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('TipoMedia', 'create'))
			<br/>
			<a href="{{ url("/site-admin/tipo_media/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Tipo Media</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Descrição</th>
	                  		<th>Status</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($tipo_media as $tm)
		                	<tr class="gradeX">
		                  		<td>{{ $tm->id }}</td>
		                  		<td>{{ $tm->descricao }}</td>
		                  		<td>{{ $tm->status == 1 ? 'Ativo' : 'Inativo' }}</td>
		                  		<td>
	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/tipo_media/'.$tm->id]) }}
	                  					@if (Auth::user()->pode('TipoMedia', 'show'))
	                  						<a href="{{ url('/site-admin/tipo_media/'.$tm->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  					@endif
	                  					@if (Auth::user()->pode('TipoMedia', 'edit'))
	                  						<a href="{{ url('/site-admin/tipo_media/'.$tm->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  					@endif
                  						@if (Auth::user()->pode('TipoMedia', 'destroy'))
                  							<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  						@endif
	                  				{{ Form::close() }}
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="4">Nenhum tipo_media cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $tipo_media->links() }}</div>

	</div>

@endsection
