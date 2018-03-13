@extends('Portal_OS.layouts',
    [
        'css'=>'post',
        'title'=>'Portal Ouvido e Saúde | Post'
    ]
)

@extends('Portal_OS.components.metatags.header-metatags',
    [
        'metatags' => [
            'url' => route('blogPost',str_slug($post[0]->titulo)),
            'description' => $post[0]->resumo
        ]
    ]
)

@extends('Portal_OS.amp.layouts',
    [
        'css' => 'post',
        'ampRouteName' => 'ampPost',
        'canonRouteName' => 'post',
        'amp_components' => [
            ['lib' => ['name' => '','version'=>'']]
        ]
    ]
)

@extends('Portal_OS.components.scripts.scripts',[
    'page' => 'post',
    'modules'=>
    [
        ''
    ]
])

@section('header')
    @include('Portal_OS.components.header',
    [
        'title' => 'post',
        'active'=> 'blog'
    ])
@endsection

@section('content')
    @include('Portal_OS.partials.post')
@endsection

@section('footer')
    @include('Portal_OS.components.footer')
@endsection