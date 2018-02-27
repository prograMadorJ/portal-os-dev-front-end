@extends('layouts',
    [
        'css'=>'blog',
        'js'=>'blog',
        'title'=>'Portal Ouvido e Saúde | Blog'
    ]
)

@extends('amp.layouts',
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
    @include('components.header',
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
    @include('partials.blog')
@endsection

@section('footer')
    @include('components.footer')
@endsection