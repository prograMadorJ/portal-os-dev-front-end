@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Media', 'create'))
			<br/>
			<a href="{{ url("/site-admin/media/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-th"></i>
				</span>
				<h5>Media</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th>Arquivo</th>
							<th>Título</th>
							<th>Status</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($media as $m)
							<tr class="gradeX">
								<td>
									@if ($m->tipo_media_id == 1)
										<img src="{{ $m->arquivo() }}" style="width:75px">
									@endif
								</td>
								<td>{{ $m->titulo }}</td>
								<td>{{ $m->status == 1 ? 'Ativo' : 'Inativo' }}</td>
								<td>
									@if (Auth::user()->pode('Media', 'destroy'))
										<form action="{{ url('/site-admin/media/'.$m->id) }}" method="post">
											<input type="hidden" name="_method" value="delete">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
									@endif
										@if (Auth::user()->pode('Media', 'show'))
											<a href="{{ url('/site-admin/media/'.$m->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
										@endif
										@if (Auth::user()->pode('Media', 'edit'))
											<a href="{{ url('/site-admin/media/'.$m->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
										@endif
									@if (Auth::user()->pode('Media', 'destroy'))
											<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
										</form>
									@endif
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4">Nenhuma media cadastrada.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>

		<div class="pagination">{{ $media->links() }}</div>

	</div>

@endsection
