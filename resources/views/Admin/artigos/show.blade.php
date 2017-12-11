@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do artigo')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/artigos') }}" class="btn btn-default"><span class="icon icon-font"></span> Todos os Artigos</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Artigo</h5>
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
	                  		<td>{{ $artigo->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Título</td>
	                  		<td>{{ $artigo->titulo }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Resumo</td>
	                  		<td>{{ $artigo->resumo }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Descrição</td>
	                  		<td>{!! $artigo->conteudo !!}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Categorias</td>
	                  		<td>
	                  			<ul>
	                  				@foreach($artigo->categorias as $categoria)
	                  					<li>{{ $categoria->nome }}</li>
	                  				@endforeach
	                  			</ul>
	                  		</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Imagem</td>
	                  		<td>
								@if ($artigo->media)
									<p><img src="{{ $artigo->media->arquivo() }}" style="width:300px"></p>
									<p>
										<span class="badge {{ $artigo->media->badge_size() }}">
											{{ number_format($artigo->media->tamanho_arquivo / 1024, 2, ',', '.') }} KB
										</span>
									</p>
								@endif
							</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Título da Imagem</td>
	                  		<td>{{ $artigo->imagem_titulo }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>URL Amigável</td>
	                  		<td>{{ $artigo->url }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Título do Link</td>
	                  		<td>{{ $artigo->link_titulo }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Data de publicação</td>
	                  		<td>{{ $artigo->publicacao }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Agendamento</td>
	                  		<td>{{ $artigo->agendado }}</td>
	                  	</tr>
						<tr>
							<td>Autor</td>
							<td>{{ $artigo->usuario ? $artigo->usuario->name : '-' }}</td>
						</tr>
						<tr>
							<td>Views</td>
							<td>{{ count($artigo->estatisticas) }}</td>
						</tr>
						<tr>
							<td>Meta titulo</td>
							<td>{{ $artigo->seo->meta_titulo }}</td>
						</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $artigo->status == 1 ? 'Ativo' : 'Inativo' }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Artigo', 'edit'))
			<a href="{{ url('/site-admin/artigos/'.$artigo->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
