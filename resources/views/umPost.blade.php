<body>
	{{ $post[0]->titulo }}<br>
	@foreach($post[0]->categorias as $cat)
		{{ $cat->nome }}<br>
	@endforeach
	{{ $post[0]->conteudo }}
</body>
