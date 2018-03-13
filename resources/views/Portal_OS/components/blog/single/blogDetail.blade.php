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
        @include('Portal_OS.components.share.sharing-panel',
         [
             'share_url' => route('blogPost', $post[0]->url),
             'share_text' => $post[0]->resumo,
             'share_hashtag' => str_slug($post[0]->titulo),
             'icon_facebook' => 'Portal_OS.components.graphics.icon-facebook',
             'icon_twitter' => 'Portal_OS.components.graphics.icon-twitter',
             'icon_google' => 'Portal_OS.components.graphics.icon-google',
             'icon_whatsapp' => 'Portal_OS.components.graphics.icon-whatsapp'
         ]
        )
    </div>
    <div class="blog-detail__content">
        <p>
            {!! nl2br(e($post[0]->conteudo)) !!}
        </p>
        @include('Portal_OS.components.blog.single.components.postsSuggested')
    </div>
</div>

