<body>
	@foreach($posts as $post)
		<b>{{ $post->titulo }}</b>
		<br>
		{{ $post->resumo }}
		<br>
		<b>{{ $post->usuario->name }}</b>
		<br>
		@foreach($post->categorias as $cat)
			<i>{{ $cat->nome }}</i>
			<br>
		@endforeach
		<br><br><br><br>
	@endforeach
	{!! $posts->render() !!}
	<a href="">
		VEJA MAIS
	</a>
</body>
