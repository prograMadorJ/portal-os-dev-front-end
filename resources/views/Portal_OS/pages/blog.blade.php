@extends('Portal_OS.layouts',
    [
        'css'=>'blog',
        'js'=>'blog',
        'title'=>'Portal Ouvido e Saúde | Blog'
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
        'active'=> (object)
        [
            'home'=>'',
            'indicacao'=>'',
            'blog'=>'--active',
            'historias'=>'',
            'sac'=>''
        ]
    ])
@endsection

@section('content')
    @include('Portal_OS.partials.blog')
@endsection

@section('footer')
    @include('Portal_OS.components.footer')
@endsection