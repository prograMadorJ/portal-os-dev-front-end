@extends('Portal_OS.layouts',
    [
        'css' => 'stories',
        'title' => 'Portal Ouvido e Saúde | Histórias Reais'
     ]
)

@extends('Portal_OS.amp.layouts',
    [
        'css' => 'stories',
        'ampRouteName' => 'ampStories',
        'canonRouteName' => 'stories',
        'amp_components' => [
            ['lib' => ['name' => '','version'=>'']]
        ]
    ]
)

@extends('Portal_OS.components.scripts',[
    'page' => 'stories',
    'modules'=>
    [
        ''
    ]
])

@section('header')
    @include('Portal_OS.components.header',
    [
        'title'=> 'histórias',
        'active'=> 'historias'
    ])
@endsection

@section('content')
    @include('Portal_OS.partials.stories')
@endsection

@section('footer')
    @include('Portal_OS.components.footer')
@endsection