@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do script')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/scripts') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os scripts</a>
		</p>

		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
				<h5>Script</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Atributos</th>
							<th>Valor</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td>#ID</td>
							<td>{{ $script->id }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Nome</td>
							<td>{{ $script->name }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Código</td>
							<td>{{ $script->code }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Local</td>
							<td>
								@foreach ($script->places as $place)
									{{ $place->descricao }} -
								@endforeach
							</td>
						</tr>
						<tr class="odd gradeX">
							<td>No topo</td>
							<td>{{ $script->in_top == 1 ? "Sim" : "Não" }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Status</td>
							<td>{{ $script->status == 1 ? 'Ativo' : 'Inativo' }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Script', 'edit'))
			<a href="{{ url('/site-admin/scripts/'.$script->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
