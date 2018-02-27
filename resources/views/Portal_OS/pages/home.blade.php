@extends('layouts',
    [
        'css' => 'home',
        'js' => 'home',
        'title' => 'Portal Ouvido e Saúde | Agende sua consulta'
    ]
)

@extends('amp.layouts',
    [
        'css' => 'home',
        'ampRouteName' => 'ampHome',
        'canonRouteName' => 'home',
        'amp_components' => [
            ['lib' => ['name' => 'amp-form','version'=>'0.1']],
            ['lib' => ['name' => 'amp-mustache','version'=>'0.1']]
        ]
    ]
)


@section('header')
    @include('components.header',
    [
        'title'=> 'home',
        'active'=> (object)
        [
            'home'=>'--active',
            'indicacao'=>'',
            'blog'=>'',
            'historias'=>'',
            'sac'=>''
        ]
    ])
@endsection

@section('content')
    @include('partials.home')
@endsection

@section('footer')
    @include('components.footer')
@endsection