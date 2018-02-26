<body>
	{{-- {{dd($postsFiltrados->categorias)}} --}}

	@foreach($postsFiltrados as $post)
		<b>{{ $post->titulo }} - {{ $post->id }}</b><br>
		@foreach($post->categorias as $cat)
			{{ $cat->nome }}<br>
		@endforeach
		{{ $post->resumo }}<br><br><br><br>
	@endforeach

</body>
