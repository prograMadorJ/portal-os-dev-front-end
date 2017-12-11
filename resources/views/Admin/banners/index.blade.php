@extends('layouts.Admin.app')

@section('content')

	<div class="container-fluid">

		@if (Auth::user()->pode('Banner', 'create'))
			<br/>
			<a href="{{ url("/site-admin/banners/create") }}" class="btn btn-primary"><span class="icon icon-plus"></span></a>
		@endif

		<div class="widget-box">
         	<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            	<h5>Banners</h5>
          	</div>
          	<div class="widget-content nopadding">
            	<table class="table table-bordered data-table">
	              	<thead>
	                	<tr>
							<th>Nome</th>
	                  		<th>Imagem</th>
	                  		<th>Data de Publicação</th>
							<th>Data de Expiração</th>
							<th>Status</th>
	                  		<th width="12%">Ações</th>
	                	</tr>
	              	</thead>
	              	<tbody>
	              		@forelse ($banners as $banner)
		                	<tr class="gradeX">
								<td>{{ $banner->nome }}</td>
		                  		<td>
									@if ($banner->media)
										<img src="{{ $banner->media->arquivo() }}" style="height:50px">
									@endif
								</td>
		                  		<td>{{ date('d\/m\/Y \à\s H:i', strtotime($banner->periodo_inicio)) }}</td>
								<td>{{ date('d\/m\/Y \à\s H\:i', strtotime($banner->periodo_final)) }}</td>
								<td>{{ $banner->status == 1 ? 'Ativo' : 'Inativo' }}</td>
		                  		<td>
		                  			@if (Auth::user()->pode('Banner', 'destroy'))
		                  				{{ Form::open(['method' => 'delete', 'url' => '/site-admin/banners/'.$banner->id]) }}
		                  			@endif
		                  				@if (Auth::user()->pode('Banner', 'show'))
		                  					<a href="{{ url('/site-admin/banners/'.$banner->id) }}" class="btn btn-info"><span class="icon icon-list"></span></a>
		                  				@endif
		                  				@if (Auth::user()->pode('Banner', 'edit'))
		                  					<a href="{{ url('/site-admin/banners/'.$banner->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		                  				@endif
                  					@if (Auth::user()->pode('Banner', 'destroy'))
                  							<button class="btn btn-danger" onclick="javascript:if(confirm('Deseja excluir o registro?') == false) return false;" type="submit"><span class="icon icon-trash"></span></button>
	                  					{{ Form::close() }}
	                  				@endif
		                  		</td>
		                	</tr>
		                @empty
		                	<tr>
		                		<td colspan="6">Nenhum banner cadastrado.</td>
		                	</tr>
		                @endforelse
	             	</tbody>
            	</table>
          	</div>
    	</div>

    	<div class="pagination">{{ $banners->links() }}</div>

    </div>

@endsection
