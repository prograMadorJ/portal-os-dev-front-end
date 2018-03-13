@extends('Portal_OS.layouts',
    [
        'css' => 'home',
        'title' => 'Portal Ouvido e Saúde | Agende sua consulta'
    ]
)

@extends('Portal_OS.amp.layouts',
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

@extends('Portal_OS.components.scripts.scripts',[
    'page' => 'home',
    'modules'=>
    [
        ''
    ]
])

@section('header')
    @include('Portal_OS.components.layouts.header',
    [
        'title'=> 'home',
        'active'=> 'home'
    ])
@endsection

@section('content')
    @include('Portal_OS.partials.home')
@endsection

@section('footer')
    @include('Portal_OS.components.layouts.footer')
@endsection