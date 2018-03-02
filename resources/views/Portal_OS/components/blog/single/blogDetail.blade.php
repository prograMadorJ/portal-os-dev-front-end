
@php
    $date = date_create($post[0]->publicacao);
@endphp
<div class="blog-detail" id="blog-detail">
    <div class="blog-detail__title">
        @foreach($post[0]->categorias as $cat)
            <span class="blog-detail__category">
                {{ $cat->nome }}
            </span>
        @endforeach
        <span class="blog-detail__date">
            {{ date_format($date,"d/m/y - H") }}H
        </span>
        <h3>
            {{ $post[0]->titulo }}
        </h3>
    </div>
    <div class="blog-detail__resume">
        <span>
            {{ $post[0]->resumo }}
        </span>
    </div>
    <div class="blog-detail__image">
        @if(isset($post[0]->media_id))
            <img src="{{ asset('img/post-img/' . $post[0]->media->arquivo) }}">
        @else
            <img src="{{asset('portal-os/img/img-post.jpg')}}">
        @endif

    </div>
    <div class="blog-detail__social">
        <a href="#facebook">@include('Portal_OS.components.graphics.icon-facebook')</a>
        <a href="#twitter">@include('Portal_OS.components.graphics.icon-twitter')</a>
        <a href="#google">@include('Portal_OS.components.graphics.icon-google')</a>
        <a href="#whatsapp">@include('Portal_OS.components.graphics.icon-whatsapp')</a>
    </div>
    <div class="blog-detail__content">
        <p>
            {!! nl2br(e($post[0]->conteudo)) !!}
        </p>
        @include('Portal_OS.components.blog.single.components.postsSuggested')
    </div>
</div>

