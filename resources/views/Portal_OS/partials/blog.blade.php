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
        <a href="#veja-mais" route="{{route('loadMore')}}" class="none" id="carregar">
            Veja Mais
        </a>
    </div>
</div>

@include('Portal_OS.components.blog.main.blogFooter')

