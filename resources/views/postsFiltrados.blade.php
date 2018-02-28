<body>
	@foreach($postsFiltrados as $post)
		<a href="{{ route('blogPost', $post->slug) }}"><b>{{ $post->titulo }} - {{ $post->id }}</b></a><br>
		@foreach($post->categorias as $cat)
			{{ $cat->nome }}<br>
		@endforeach
		{{ $post->resumo }}<br><br><br><br>
	@endforeach
	<a href="{{ route('loadMore') }}">
		VEJA MAIS
	</a>
</body>
