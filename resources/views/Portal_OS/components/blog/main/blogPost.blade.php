@foreach($posts as $post)
    @php
        $date = date_create($post->publicacao);
    @endphp
    <div class="blog-post" id="blog-post">
        <div class="blog-post__title" >
            <h3 id="artTitle">
                {{ $post->titulo }}
            </h3>
            @foreach($post->categorias as $cat)
                <span class="blog-post__category"> {{ $cat->nome }} </span>
            @endforeach
            <span class="blog-post__date" id="artDate">
                {{ date_format($date,"d/m/y - H") }}H
            </span>
        </div>
        <div class="blog-post__image" id="artImage">
            @if(isset($post->media_id))
                <img src="{{ asset('img/post-img/' . $post->media->arquivo) }}">
            @else
                <img src="{{asset('portal-os/img/img-post.jpg')}}">
            @endif
        </div>
        <div class="blog-post__resume">
            <p id="artSumma">
                {{ $post->resumo }}
            </p>
        </div>
        <div class="blog-post__link">
            <a href="{{ route('blogPost', $post->slug) }}">
                Leia mais
            </a>
        </div>
        <div class="blog-post__social">
            <a href="#facebook">@include('Portal_OS.components.graphics.icon-facebook')</a>
            <a href="#twitter">@include('Portal_OS.components.graphics.icon-twitter')</a>
            <a href="#google">@include('Portal_OS.components.graphics.icon-google')</a>
            <a href="#whatsapp">@include('Portal_OS.components.graphics.icon-whatsapp')</a>
        </div>
    </div>
@endforeach

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript">

    $(document).on('click', '#carregar', function(e) {
        e.preventDefault();

        var lista = {!! $posts !!};
        console.log("lista ", lista);

        // var lastId = lista[5].id;
        // console.log("lista 5 id", lastId);

        $('#carregar').html("Carregando Mais Artigos");

        $.ajax({
            url: '{{ route('loadMore') }}',
            method: 'GET',
            // data: {
            //     'id': lastId,
            // },
            // contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data) {
                // console.log("data not null", data);

                $('#blog-post').html(data);
                console.log("data depois do apend", data);

                lastId = data[5].id;
                console.log("last id passando data", lastId);

                $('#carregar').html("veja mais");

                return data[5].id;
            }

        });
    });
</script>
