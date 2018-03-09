@foreach($posts as $post)
    @php
        $date = date_create($post->publicacao);
    @endphp
    <div class="blog-post" id="blog-post">
        <div class="blog-post__title">
            <h3>
                {{ $post->titulo }}
            </h3>
            @foreach($post->categorias as $cat)
                <span class="blog-post__category"> {{ $cat->nome }} </span>
            @endforeach
            <span class="blog-post__date">
                {{ date_format($date,"d/m/y - H") }}H
            </span>
        </div>
        <div class="blog-post__image">
            @if(isset($post->media_id))
                <img src="{{ asset('img/post-img/' . $post->media->arquivo) }}">
            @else
                <img src="{{asset('portal-os/img/img-post.jpg')}}">
            @endif
        </div>
        <div class="blog-post__resume">
            <p>
                {{ $post->resumo }}
            </p>
        </div>
        <div class="blog-post__link">
            <a href="{{ route('blogPost', $post->url) }}">
                Leia mais
            </a>
        </div>
        <div class="blog-post__social">
           @include('Portal_OS.components.sharing-panel',
            [
                'share_url' => route('blogPost', $post->url),
                'share_text' => $post->resumo,
                'share_hashtag' => str_slug($post->titulo),
                'icon_facebook' => 'Portal_OS.components.graphics.icon-facebook',
                'icon_twitter' => 'Portal_OS.components.graphics.icon-twitter',
                'icon_google' => 'Portal_OS.components.graphics.icon-google',
                'icon_whatsapp' => 'Portal_OS.components.graphics.icon-whatsapp'
            ]
           )
        </div>
    </div>
@endforeach
