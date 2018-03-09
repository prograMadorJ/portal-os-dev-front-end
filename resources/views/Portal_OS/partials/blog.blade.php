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
    <div class="blog__load">
        <a href="#veja-mais" id="carregar">
            Veja mais
        </a>
    </div>
</div>

@include('Portal_OS.components.blog.main.blogFooter')

<script type="text/javascript">
    $.event('#carregar','click',function () {
        HttpRequest.get('{{ route('loadMore') }}?limit=6&skip=6',function (res) {
            $.append('.blog__main',res.data);
        });
    });
</script>