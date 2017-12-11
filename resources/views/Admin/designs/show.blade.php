@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do design')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/designs') }}" class="btn btn-default"><span class="icon icon-heart"></span> Todos os Designs</a>
		</p>

		<div class="widget-box">
        	<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            	<h5>Design</h5>
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
	                  		<td>{{ $design->id }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Título</td>
	                  		<td>{{ $design->titulo }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Conteúdo</td>
	                  		<td><?php echo $design->conteudo; ?></td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Imagem</td>
	                  		<td>
								@if ($design->media)
									<img src="{{ $design->media->arquivo() }}">
								@endif
							</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Produto</td>
	                  		<td>{{ $design->produto->nome }}</td>
	                  	</tr>
	                  	<tr class="odd gradeX">
	                  		<td>Status</td>
	                  		<td>{{ $design->status == 1 ? 'Ativo' : 'Inativo' }}</td>
	                  	</tr>
	              	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Design', 'edit'))
			<a href="{{ url('/site-admin/designs/'.$design->id.'/edit') }}" class="btn btn-warning"><span class="icon icon-edit"></span></a>
		@endif

	</div>

@endsection
