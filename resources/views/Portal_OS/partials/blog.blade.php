<div class=blog>
    <div class="blog__main" id="blogApp">
        <h1>
            Blog Ouvido e Saúde
        </h1>
        <h2>
            Tudo o que você precisa saber sobre sua saúde
        </h2>
        @include('Portal_OS.components.blog.main.blogPost')
    </div>
    <div class="blog__right">
        @include('Portal_OS.components.blog.general.blogPanel')
    </div>
    {{-- <div class="blog__load">
        <a href="#veja-mais" route="{{route('loadMore', $prefix)}}" class="none" id="carregar">
            Veja Mais
        </a>
    </div> --}}
</div>

@include('Portal_OS.components.blog.main.blogFooter')

{{-- <script type="text/javascript">
    var click = 0;
    var contador = 6;

    $.event('#carregar','click',function () {
        click++;
        skipper = contador * click;

        HttpRequest.get('{{ route('filtroCategorias') }}?limit=6&skip=' + skipper, function (res) {
            if(res.data != "") {
                $.append('.blog__main', res.data);
            } else {
                $.replaceAll('.none',"sem mais artigos para carregar");
                $.css('.none', 'pointer-events: none !important; background-color: lightgrey;');
            }
        });
    });
</script> --}}
