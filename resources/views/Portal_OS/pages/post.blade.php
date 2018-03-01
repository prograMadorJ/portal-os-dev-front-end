@extends('layouts',
    [
        'css'=>'post',
        'js'=>'post',
        'title'=>'Portal Ouvido e Saúde | Post'
    ]
)

@extends('amp.layouts',
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
    @include('components.header',
    [
        'title' => 'post',
        'active'=> (object)
        [
            'home'=>'',
            'indicacao'=>'',
            'blog'=>'',
            'historias'=>'',
            'sac'=>''
        ]
    ])
@endsection

@section('content')
    @include('partials.post')
@endsection

@section('footer')
    @include('components.footer')
@endsection