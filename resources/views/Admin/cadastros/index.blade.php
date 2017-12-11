@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Cadastro', 'create'))
			<br/>
			<a href="{{ url("/site-admin/cadastros/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
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
							<th>Nome</th>
							<th>E-mail</th>
							<th>Telefone</th>
							<th>Tipo do Cadastro</th>
							<th>IP Cadastrado</th>
							<th>Página Origem</th>
							<th>Status</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($cadastros as $cadastro)
							<tr class="gradeX">
								<td>{{ $cadastro->id }}</td>
								<td>{{ $cadastro->nome }}</td>
								<td>{{ $cadastro->email }}</td>
								<td>{{ $cadastro->telefone }}</td>
								<td>{{ $cadastro->tipo_cadastro ? $cadastro->tipo_cadastro->descricao : '-' }}</td>
								<td>{{ $cadastro->cliente_ip }}</td>
								<td>
									@if ($cadastro->page_origin)
										<a href="{{ $cadastro->page_origin }}" target="_blank" class="btn btn-info"><span class="icon icon-globe"></span></a>
									@else
										-
									@endif
								</td>
								<td>{{ $cadastro->status }}</td>
								<td>
									@if (Auth::user()->pode('Cadastro', 'destroy'))
										{{ Form::open(['method' => 'delete', 'url' => '/site-admin/cadastros/'.$cadastro->id]) }}
									@endif
									@if (Auth::user()->pode('Cadastro', 'show'))
										<a href="{{ url('/site-admin/cadastros/'.$cadastro->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
									@endif
									@if (Auth::user()->pode('Cadastro', 'edit'))
										<a href="{{ url('/site-admin/cadastros/'.$cadastro->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
									@endif
									@if (Auth::user()->pode('Cadastro', 'destroy'))
										<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
										{{ Form::close() }}
									@endif
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="7">Nenhum cadastro cadastrado.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>

		<div class="pagination">{{ $cadastros->links() }}</div>

	</div>

@endsection
