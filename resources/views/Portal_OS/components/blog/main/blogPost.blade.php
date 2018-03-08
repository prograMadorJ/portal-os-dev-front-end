@foreach($posts as $post)
    @php
        $date = date_create($post->publicacao);
    @endphp
    <div class="blog-post">
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
        // console.log("lista ", lista);

        $('#carregar').html("Carregando Mais Artigos");

        $.ajax({
            url: '{{ route('loadMore') }}?limit=6&skip=6',
            method: 'GET',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            // success: function(data) {
            //     // console.log("data not null", data);
            //     console.log("access att que deveria ser apendado", data[0].titulo);

            //     $('#blogApp').append(data[0].titulo);
            //     // console.log("data depois do apend", data);

            //     $('#carregar').html("veja mais");
            // }
        })
        .done(function(res) {
            for(i = 0; i < $(res).length; i++){
                var data = new Date(res[i].publicacao);
                var dia = data.getDate();
                var mes = data.getMonth();
                mes += 1;
                var ano = data.getFullYear();
                var hora = data.getHours();
                var min = data.getMinutes();
                var dataFinal = "" + dia + "/" + mes + "/" + ano + " - " + hora;
                var rota = res[i].slug;

                var titulo = '<div class="blog-post__title" ><h3 id="artTitle">'
                    + res[i].titulo +
                '</h3><span class="blog-post__category">'
                    + res[i].categorias.nome +
                '</span><span class="blog-post__date" id="artDate">'
                    + dataFinal +
                'H</span></div>';

                var imagem = '<div class="blog-post__image" id="artImage"><img src="{{ asset('img/post-img/\'.res[i].media.arquivo') }}"></div>';

                var resumo = '<div class="blog-post__resume"><p id="artSumma">'
                    + res[i].resumo +
                '</p></div>';

                var ref = {{route('blogPost', rota)}};
                console.log(ref);
                var link = '<div class="blog-post__link"><a href="'ref'">Leia mais</a></div>';
                console.log("LINK",link);

                var social = '<div class="blog-post__social">'
                    '<a href="#facebook">@include('Portal_OS.components.graphics.icon-facebook')</a>'
                    '<a href="#twitter">@include('Portal_OS.components.graphics.icon-twitter')</a>'
                    '<a href="#google">@include('Portal_OS.components.graphics.icon-google')</a>'
                    '<a href="#whatsapp">@include('Portal_OS.components.graphics.icon-whatsapp')</a>'
                '</div>';

                $('#blogApp').append(titulo, imagem, resumo, link);
            }

            $('#carregar').html("veja mais");
        });
    });
</script>
