@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do banner')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/banners') }}" class="btn btn-default"><span class="icon icon-picture"></span> Todos os Banners</a>
		</p>

		<div class="widget-box">
	      	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
	          	<h5>Banner</h5>
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
	                  		<td>{{ $banner->id }}</td>
	                  	</tr>
						<tr class="odd gradeX">
							<td>Nome</td>
							<td>{{ $banner->nome }}</td>
						</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Imagem</td>
	                  		<td>
								@if ($banner->media)
									<img src="{{ $banner->media->arquivo() }}" width="320">
								@endif
							</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Local</td>
	                  		<td>{{ $banner->local ? $banner->local->descricao : '-' }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Link</td>
	                  		<td>{{ $banner->link }}</td>
	                  	</tr>
						<tr class="odd gradeX">
							<td>Título</td>
							<td>{{ $banner->titulo }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Subtítulo</td>
							<td>{{ $banner->subtitulo }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Botão link</td>
							<td>{!! $banner->botao_link !!}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Botão texto</td>
							<td>{!! $banner->botao_texto !!}</td>
						</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Data de publicação</td>
	                  		<td>{{ date('d/m/Y h:i:s', strtotime($banner->periodo_inicio)) }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Data de expiração</td>
	                  		<td>{{ $banner->periodo_final }}</td>
	                  	</tr>
						<tr class="odd gradeX">
							<td>Índice</td>
							<td>{{ $banner->indice }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Status</td>
							<td>{{ $banner->status }}</td>
						</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Banner', 'edit'))
			<a href="{{ url('/site-admin/banners/'.$banner->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
