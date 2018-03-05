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
