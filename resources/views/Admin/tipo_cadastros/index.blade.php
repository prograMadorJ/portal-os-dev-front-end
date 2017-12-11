@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('TipoCadastro', 'create'))
			<br/>
			<a href="{{ url("/site-admin/tipo_cadastros/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Cadastros</h5>
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
	              		@forelse ($tipo_cadastros as $tipo_cadastro)
		                	<tr class="gradeX">
		                  		<td>{{ $tipo_cadastro->id }}</td>
		                  		<td>{{ $tipo_cadastro->descricao }}</td>
		                  		<td>{{ $tipo_cadastro->status }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('TipoCadastro', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/tipo_cadastros/'.$tipo_cadastro->id]) }}
		                  			@endif
	                  				@if (Auth::user()->pode('TipoCadastro', 'show'))
	                  					<a href="{{ url('/site-admin/tipo_cadastros/'.$tipo_cadastro->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif
	                  				@if (Auth::user()->pode('TipoCadastro', 'edit'))
	                  					<a href="{{ url('/site-admin/tipo_cadastros/'.$tipo_cadastro->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif
                  					@if (Auth::user()->pode('TipoCadastro', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
	                  					{{ Form::close() }}
	                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="4">Nenhum tipo de cadastro cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $tipo_cadastros->links() }}</div>

    </div>

@endsection
