<body>
	<b>{{ $post[0]->titulo }}</b><br>
	@foreach($post[0]->categorias as $cat)
		{{ $cat->nome }}<br>
	@endforeach
	{!! nl2br(e($post[0]->conteudo)) !!}
</body>
