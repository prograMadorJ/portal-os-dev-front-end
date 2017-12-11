@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do depoimento')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/depoimentos') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Depoimentos</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Depoimento</h5>
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
	                  		<td>{{ $depoimento->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Nome</td>
	                  		<td>{{ $depoimento->nome }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Local</td>
	                  		<td>{{ $depoimento->local }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Título</td>
	                  		<td>{{ $depoimento->titulo }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Conteúdo</td>
	                  		<td>{!! $depoimento->conteudo !!}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Media</td>
	                  		<td>
								@php
									if ($depoimento->media)
								@endphp
								@if ($depoimento->media && $depoimento->media->tipo_media_id == 1)
								 	<img src="{{ $depoimento->media->arquivo() }}" alt="">
								@elseif ($depoimento->media && $depoimento->media->tipo_media_id == 2)
									{{ $depoimento->media->arquivo() }}
								@endif
							</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>YouTube Vídeo</td>
	                  		<td>{{ $depoimento->youtube_video }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Ordem</td>
	                  		<td>{{ $depoimento->ordem }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Destaque</td>
	                  		<td>{{ $depoimento->destaque == 1 ? 'Sim' : 'Não' }}</td>
	                  	</tr>
						<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $depoimento->status == 1 ? 'Ativo' : 'Inativo' }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Depoimento', 'edit'))
			<a href="{{ url('/site-admin/depoimentos/'.$depoimento->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
