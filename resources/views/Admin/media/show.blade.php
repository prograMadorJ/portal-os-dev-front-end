@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes da media')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/media') }}" class="btn btn-default"><span class="icon icon-camera"></span> Todas as Media</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Media</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered table-striped">
	              	<thead>
	                	<tr>
	                  		<th>Atributos</th>
	                  		<th colspan="4">Valor</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	                	<tr class="odd gradeX">
	                  		<td class="bold">#ID</td>
	                  		<td colspan="4">{{ $media->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td class="bold">Arquivo</td>
	                  		@if ($media->tipo_media_id == 1)
	                  			<td colspan="4"><img src="{{ $media->arquivo() }}" width="300px"></td>
                  			@elseif ($media->tipo_media_id == 2)
                  				<td>
									<video src="{{ $media->arquivo() }}" controls width="650">
										<p>Seu navegador não tem suporte</p>
                  					</video>
								</td>
                  			@endif
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td class="bold">URL arquivo</td>
	                  		<td colspan="4">{!! $media->arquivo !!}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td class="bold">Título</td>
	                  		<td colspan="4">{{ $media->titulo }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td class="bold">Descrição</td>
	                  		<td colspan="4">{!! $media->descricao !!}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td class="bold">Tipo da media</td>
	                  		<td colspan="4">{{ $media->tipo_media ? $media->tipo_media->descricao : '-' }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td class="bold">Status</td>
	                  		<td colspan="4">{{ $media->status == 1 ? 'Ativo' : 'Inativo' }}</td>
	                  	</tr>
						<tr class="odd gradeX">
							<td class="bold" colspan="5">Imagens derivadas</td>
						</tr>
						@foreach ($media->media_derivatives as $md)
							<tr class="odd gradeX">
								<td></td>
								<td class="bold">Imagem</td>
								<td>
									<img src="{{ $md->media->arquivo() }}" width="200px">
								</td>
								<td class="bold">Resolução</td>
								<td>{{ $md->screens() }}</td>
							</tr>
						@endforeach
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Media', 'edit'))
			<a href="{{ url('/site-admin/media/'.$media->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
