@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Scripts')
	<hr/>

	<div class="container-fluid">

		@if (Auth::user()->pode('Script', 'create'))
			<a href="{{ url("/site-admin/scripts/create") }}" class="btn btn-info"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Scripts</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th width="12%">#ID</th>
							<th>Nome</th>
							<th width="12%">No top</th>
							<th width="12%">Status</th>
							<th width="12%">Ações</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($scripts as $script)
							<tr class="gradeX">
								<td>{{ $script->id }}</td>
								<td>{{ $script->name }}</td>
								<td class="center">{{ $script->in_top == 1 ? 'Sim' : 'Não' }}</td>
								<td>{{ $script->status == 1 ? 'Ativo' : 'Inativo' }}</td>
								<td>

									{{ Form::open(['method' => 'delete', 'url' => '/site-admin/scripts/'.$script->id]) }}

									@if (Auth::user()->pode('Script', 'show'))
										<a href="{{ url('/site-admin/scripts/'.$script->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
									@endif

									@if (Auth::user()->pode('Script', 'edit'))
										<a href="{{ url('/site-admin/scripts/'.$script->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
									@endif

									@if (Auth::user()->pode('Script', 'destroy'))
										<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
									@endif

									{{ Form::close() }}

								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4">Nenhum script cadastrado.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>

		<div class="pagination">{{ $scripts->links() }}</div>

	</div>

@endsection
