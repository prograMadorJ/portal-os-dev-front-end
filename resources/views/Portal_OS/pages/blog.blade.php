@extends('Portal_OS.layouts',
    [
        'css'=>'blog',
        'js'=>'',
        'title'=>'Portal Ouvido e Saúde | Blog'
    ]
)

@extends('Portal_OS.components.header-metatags',
    [
        'metatags' => [
            'url' => route('blogIndex'),
            'description' => 'Blog Ouvido e Saúde. Tudo o que você precisa saber sobre sua saúde.'
        ]
    ]
)

@extends('Portal_OS.amp.layouts',
    [
        'css' => 'blog',
        'ampRouteName' => 'ampBlog',
        'canonRouteName' => 'blog',
        'amp_components' => [
            ['lib' => ['name' => '','version'=>'']]
        ]
    ]
)

@section('header')
    @include('Portal_OS.components.header',
    [
        'title' => 'blog',
        'active'=> 'blog'
    ])
@endsection

@section('content')
    @include('Portal_OS.partials.blog')
@endsection

@section('footer')
    @include('Portal_OS.components.footer')
@endsection
