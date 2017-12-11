@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Perguntas Frequentes')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('Questao', 'create'))
			<br/>
			<a href="{{ url("/site-admin/questoes/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Perguntas Frequentes</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>#ID</th>
	                  		<th>Pergunta</th>
	                  		<th>Status</th>
	                  		<th>Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($questoes as $questao)
		                	<tr class="gradeX">
		                  		<td>{{ $questao->id }}</td>
		                  		<td>{{ $questao->pergunta }}</td>
		                  		<td>{{ $questao->status }}</td>
		                  		<td>

	                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/questoes/'.$questao->id]) }}

	                  				@if (Auth::user()->pode('Questao', 'show'))
	                  					<a href="{{ url('/site-admin/questoes/'.$questao->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
	                  				@endif

	                  				@if (Auth::user()->pode('Questao', 'edit'))
	                  					<a href="{{ url('/site-admin/questoes/'.$questao->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
	                  				@endif

                  					@if (Auth::user()->pode('Questao', 'destroy'))
                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
                  					@endif

	                  				{{ Form::close() }}

		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="4">Nenhuma pergunta frenquente cadastrada.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $questoes->links() }}</div>

	</div>

@endsection
