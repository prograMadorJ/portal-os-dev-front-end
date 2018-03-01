@foreach($posts as $post)
    @php
        $date = date_create($post->publicacao)
    @endphp
    @include('Portal_OS.components.blog.main.singlePost')
@endforeach
