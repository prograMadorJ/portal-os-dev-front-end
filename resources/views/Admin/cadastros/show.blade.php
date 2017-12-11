@extends('layouts.Admin.app')

@section('content')

	@section('h1', 'Detalhes do cadastro')

	<hr/>

	<div class="container-fluid">

		<p>
			<a href="{{ url('/site-admin/cadastros') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Cadastros</a>
		</p>

		<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
    	<h5>Cadastro</h5>
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
          		<td>{{ $cadastro->id }}</td>
          	</tr>
          	<tr class="odd gradeX">
          		<td>Nome</td>
          		<td>{{ $cadastro->nome }}</td>
          	</tr>
          	<tr class="odd gradeX">
          		<td>E-mail</td>
          		<td>{{ $cadastro->email }}</td>
          	</tr>
          	<tr class="odd gradeX">
          		<td>Telefone</td>
          		<td>{{ $cadastro->telefone }}</td>
          	</tr>
						<tr class="odd gradeX">
          		<td>Tipo do Cadastro</td>
          		<td>{{ $cadastro->tipo_cadastro ? $cadastro->tipo_cadastro->descricao : '-' }}</td>
          	</tr>
						<tr class="odd gradeX">
          		<td>ID do Fonoaudiologo Indicador</td>
          		<td>{{ $cadastro->id_fonoaudiologo_indicador }}</td>
          	</tr>
						<tr class="odd gradeX">
          		<td>Assunto</td>
          		<td>{{ $cadastro->assunto }}</td>
          	</tr>
						<tr class="odd gradeX">
          		<td>Mensagem</td>
          		<td>{{ $cadastro->conteudo }}</td>
          	</tr>
						<tr class="odd gradeX">
          		<td>Cidade</td>
          		<td>{{ $cadastro->cidades ? ($cadastro->cidades->descricao . '/') : '-' }}
								{{ $cadastro->cidades ? ($cadastro->cidades->estado ? $cadastro->cidades->estado->sigla : '') : '' }}</td>
          	</tr>
						<tr class="odd gradeX">
							<td>IP do Cliente</td>
							<td>{{ $cadastro->cliente_ip }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Web Browser</td>
							<td>{{ $cadastro->http_user_agent }}</td>
						</tr>
						<tr class="odd gradeX">
							<td>Página de Origem</td>
							<td>
								@if ($cadastro->page_origin)
									{{ $cadastro->page_origin }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="{{ $cadastro->page_origin }}" target="_blank" class="btn btn-info"><span class="icon icon-globe"></span></a>
								@endif
							</td>
						</tr>
						<tr class="odd gradeX">
          		<td>Status</td>
          		<td>{{ $cadastro->status }}</td>
          	</tr>
        	</tbody>
				</table>
			</div>
		</div>

		@if (Auth::user()->pode('Cadastro', 'edit'))
			<a href="{{ url('/site-admin/cadastros/'.$cadastro->id.'/edit') }}" class="btn btn-warning">
				<span class="icon icon-edit"></span>
			</a>
			<a href="{{ url('/site-admin/depoimentos/create?nome='.$cadastro->nome.'&conteudo='.$cadastro->conteudo) }}" class="btn btn-primary">
				<span class="icon icon-plus"></span> Criar depoimento
			</a>
		@endif

		<div class="row-fluid">
	    	<div class="span12">
	        	<div class="widget-box widget-chat">
					<div class="widget-title"> <span class="icon"> <i class="icon-comment"></i> </span>
						<h5>Contato</h5>
					</div>
					<div class="widget-content nopadding">
						<div class="chat-users panel-right2">
							<div class="panel-title">
								<h5>Histórico de Contato</h5>
							</div>
							<div class="panel-content nopadding">
								<ul class="contact-list">
									<li class="online">
										<a><img alt="" src="/admin/img/demo/av1.jpg" /> <span>{{ \Auth::user()->name }} (Eu)</span></a>
									</li>
									<li>
										<a><img alt="" src="/admin/img/demo/av2.jpg" /> <span>{{ $cadastro->nome }}</span></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="chat-content panel-left2" style="height:530px">
							<div class="chat-messages" id="chat-messages">
								<div id="chat-messages-inner">
									@foreach ($cadastro->historicos_contatos as $historicos_contato)
										@include('Admin.historicos_contatos._contato')
									@endforeach
								</div>
							</div>
							<div class="chat-message well">
								{{ Form::open(['id' => 'form-chat']) }}
									<button id="btn-form-chat" type="button" class="btn btn-success">Enviar</button>
									<span class="input-box">
										É o paciente? {{ Form::checkbox('is_pacients', 1, false) }}&nbsp;&nbsp;&nbsp;&nbsp;
										{{ Form::textarea('mensagem', null, ['style' => 'width:85%;height:70px', 'required' => 'true']) }}
										{{ Form::hidden('user_id', \Auth::user()->id) }}
										{{ Form::hidden('cadastro_id', $cadastro->id) }}
									</span>
								{{ Form::close() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection

@section('js-1')
	<script type="text/javascript">
		$('#btn-form-chat').click(function() {
			var dados = $('#form-chat').serialize();
			$.ajax({
				url: '/site-admin/historicos_contatos',
				type: 'POST',
				data: dados,
				success: function(html) {
					$('#chat-messages-inner').append(html);
					$('textarea').val('');
					$('#chat-messages').animate({
						'scrollTop' : $('#chat-messages-inner').height()
					}, 'slow');
				}
			});
		});
	</script>
@endsection
