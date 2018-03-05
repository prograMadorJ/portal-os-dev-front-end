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
        <a href="{{ route('loadMore') }}" id="loadMore" onclick="loadMorePosts()">
            Veja mais
        </a>
    </div>
</div>

@include('Portal_OS.components.blog.main.blogFooter')

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript">
    var pgNum = 2;
    var offFlag = 6;
    // $(document).ready(function() {
    //     $.ajax({
    //         type: 'GET',
    //         url: "/blog?page=" +pgNum,
    //         data:{
    //             [{ $posts }],
    //             'offset': offFlag * pgNum
    //         },
    //         success: function(data) {
    //             pgNum +=1;
    //             if(data.length == 0) {
    //                 $("#loadMore").css("display","none");
    //                 console.log("NADA MAIS A CARREGAR");
    //             } else {
    //                 $('#blogPost').append(data.html);
    //             }
    //         }, error: function(data) {

    //         },
    //     })


    // });

    function loadMorePosts(e) {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: {{ route('loadMore') }},
            data: posts,
            success: function(data) {
                console.log(data);
                if(data.length == 0) {
                    $("#loadMore").css("display","none");
                    console.log("NADA MAIS A CARREGAR");
                } else {
                    $('#blogPost').append(data.html);
                }
            }, error : function(data) {

            },
        })
    }
</script>
