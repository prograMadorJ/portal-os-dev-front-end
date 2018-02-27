@extends('layouts',
    [
        'css' => 'stories',
        'js' => 'stories',
        'title' => 'Portal Ouvido e Saúde | Histórias Reais'
     ]
)

@extends('amp.layouts',
    [
        'css' => 'stories',
        'ampRouteName' => 'ampStories',
        'canonRouteName' => 'stories',
        'amp_components' => [
            ['lib' => ['name' => '','version'=>'']]
        ]
    ]
)

@section('header')
    @include('components.header',
    [
        'title'=> 'histórias',
        'active'=> (object)
        [
            'home'=>'',
            'indicacao'=>'',
            'blog'=>'',
            'historias'=>'--active',
            'sac'=>''
        ]
    ])
@endsection

@section('content')
    @include('partials.stories')
@endsection

@section('footer')
    @include('components.footer')
@endsection