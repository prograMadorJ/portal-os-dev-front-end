<div class=blog>
    <div class="blog__main">
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
        <a href="#" id="loadMore">Veja mais</a>
    </div>
</div>

@include('Portal_OS.components.blog.main.blogFooter')

<script type="text/javascript" charset="utf-8">
    HttpRequest.get('http://192.168.1.7:8000/blog',
        function (response) {
            render('',response);
            console.log(response);
        });
</script>
