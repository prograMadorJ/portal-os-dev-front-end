@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Artigo', 'create'))
			<br/>
			<a href="{{ url("/site-admin/artigos/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
			<div class="widget-title">
				<a id="btn-filtros">
					<span class="icon icon-search"></span>
					<h5>Pesquisar</h5>
				</a>
			</div>
			<div id="filtros" class="widget-content nopadding">
				{{ Form::open(['method' => 'GET', 'url' => '/site-admin/artigos', 'class' => 'form-horizontal']) }}
					<div class="control-group">
						<label class="control-label">#ID</label>
						<div class="controls">
							{{ Form::number('id', isset($_GET['id']) ? $_GET['id'] : null, ['class' => 'span11']) }}
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Título</label>
						<div class="controls">
							{{ Form::text('titulo', isset($_GET['titulo']) ? $_GET['titulo'] : null, ['class' => 'span11']) }}
						</div>
					</div>
					<div class="form-actions">
						{{ Form::submit('Filtrar', ['class' => 'btn btn-default']) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Artigos</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
	                  		<th>Título</th>
	                  		<th>Data Criação</th>
							<th>Visualizações</th>
							<th>Imagem</th>
							@if (isset($_GET['size']) && $_GET['size'])
								<th>Tamanho do arquivo</th>
							@endif
	                  		<th>Status</th>
	                  		<th width="12%">Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($artigos as $artigo)
		                	<tr class="gradeX">
		                  		<td>{{ $artigo->titulo }}</td>
		                  		<td>{{ date('d\/m\/Y \à\s H\:i', strtotime($artigo->created_at)) }}</td>
								<td>{{ $artigo->estatisticas ? count($artigo->estatisticas) : 0 }}</td>
								<td>
									@if ($artigo->media)
										<img src="{{ $artigo->media->arquivo() }}" width="150px">
									@endif
								</td>
								@if (isset($_GET['size']) && $_GET['size'])
									<td>
										@if ($artigo->media)
											<span class="badge {{ $artigo->media->badge_size() }}">
												{{ number_format($artigo->media->tamanho_arquivo / 1024, 2, ',', '.') }} KB
											<span>
										@endif
									</td>
								@endif
		                  		<td>{{ $artigo->status == 1 ? 'Ativo' : 'Inativo' }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('Artigo', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/artigos/'.$artigo->id]) }}
		                  			@endif
		                  				@if (Auth::user()->pode('Artigo', 'show'))
		                  					<a href="{{ url('/site-admin/artigos/'.$artigo->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
		                  				@endif
		                  				@if (Auth::user()->pode('Artigo', 'edit'))
		                  					<a href="{{ url('/site-admin/artigos/'.$artigo->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		                  				@endif
	                  					@if (Auth::user()->pode('Artigo', 'destroy'))
	                  						<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
		                  					{{ Form::close() }}
		                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="6">Nenhum artigo cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

		@php
		$filters = [];
		foreach ($_GET as $key => $value) {
			if ($key != 'page') {
				$filters[$key] = $value;
			}
		}
		@endphp

    	<div class="pagination">{{ $artigos->appends($filters)->links() }}</div>

    </div>

@endsection

@section('css-1')
	<style media="screen">
		#btn-filtros {
			cursor: pointer;
		}
	</style>
@endsection

@section('js-1')

	<script type="text/javascript">
		$('#filtros').hide();
		$('#btn-filtros').click(function() {
			$('#filtros').toggle();
		});
	</script>

@endsection
