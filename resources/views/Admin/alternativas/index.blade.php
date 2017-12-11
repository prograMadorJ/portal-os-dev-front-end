@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Alternativas para as perguntas')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('Alternativa', 'create'))
			<br/>
			<a href="{{ url("/site-admin/alternativas/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Alternativas</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Título</th>
							<th>Pergunta</th>
							<th>Ordem</th>
	                  		<th>Status</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($alternativas as $alternativa)
		                	<tr class="gradeX">
		                  		<td>{{ $alternativa->id }}</td>
		                  		<td>{{ $alternativa->titulo }}</td>
								<td>{{ $alternativa->pergunta ? ($alternativa->pergunta->ordem . '. ' . $alternativa->pergunta->titulo) : '-' }}</td>
								<td>{{ $alternativa->ordem }}</td>
		                  		<td>{{ $alternativa->status }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/alternativas/'.$alternativa->id]) }}

	                  				@if (Auth::user()->pode('Alternativa', 'show'))
	                  					<a href="{{ url('/site-admin/alternativas/'.$alternativa->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

	                  				@if (Auth::user()->pode('Alternativa', 'edit'))
	                  					<a href="{{ url('/site-admin/alternativas/'.$alternativa->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('Alternativa', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="6">Nenhuma alternativa cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $alternativas->links() }}</div>

	</div>

@endsection
