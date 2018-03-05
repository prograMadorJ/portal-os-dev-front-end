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
<<<<<<< HEAD
        <a href="{{ route('loadMore') }}" id="loadMore">
            Veja mais
        </a>
=======
        <a href="#" id="loadMore">Veja mais</a>
>>>>>>> dev/front-end
    </div>
</div>

@include('Portal_OS.components.blog.main.blogFooter')

{{-- <script type="text/javascript" charset="utf-8">
    HttpRequest.get('http://192.168.1.7:8000/blog',
        function (response) {
            render('',response);
            console.log(response);
        });
</script> --}}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var HttpRequest = {};
    HttpRequest.get = function (url, funcResponse) {
        axios.get(url)
            .then(funcResponse)
            .catch(function (error) {
                console.log(error);
            });
    }
    HttpRequest.post = function (url,content, funcResponse) {
        axios.post(url,content)
            .then(funcResponse)
            .catch(function (error) {
                console.log(error);
            });
    }
    var render = function (target,content) {
        for(var c in content) {
            console.log(content.data);
        }
    };
</script>
<script type="text/javascript" charset="utf-8">
    $.event('body','click',function () {
        HttpRequest.get('http://192.168.1.83:8000/blog',
            function (response) {
                console.log(response);
            });
    })
    $.event('.blog__load','click',function (e) {
        alert('voce clicou no link: '+e.target);
    })
</script>
