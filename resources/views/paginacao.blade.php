<body>
	@foreach($posts as $post)
		<a href="{{ route('blogPost', $post->slug) }}"><b>{{ $post->titulo }}</b></a>
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
	<a href="" id="btn-load">
		VEJA MAIS
	</a>

	<script type="text/javascript">

	</script>
</body>
