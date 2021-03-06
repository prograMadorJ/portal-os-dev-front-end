@extends('Portal_OS.layouts',
    [
        'css' => 'home',
        'js' => 'home',
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


@section('header')
    @include('Portal_OS.components.header',
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
    @include('Portal_OS.partials.home')
@endsection

@section('footer')
    @include('Portal_OS.components.footer')
@endsection