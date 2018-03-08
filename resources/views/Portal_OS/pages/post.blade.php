@extends('Portal_OS.layouts',
    [
        'css'=>'post',
        'js'=>'post',
        'title'=>'Portal Ouvido e Saúde | Post'
    ]
)

@extends('Portal_OS.components.header-metatags',
    [
        'metatags' => [
            'url' => route('blogPost',$post[0]->slug),
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