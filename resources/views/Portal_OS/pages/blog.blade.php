@extends('Portal_OS.layouts',
    [
        'css'=>'blog',
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

@extends('Portal_OS.components.scripts',[
    'page' => 'blog',
    'modules'=>
    [
        'http-request',
        'append',
        'replace',
        'attributes',
        'css',
        'route'
    ]
])

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
