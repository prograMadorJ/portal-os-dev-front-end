@extends('layouts',
    [
        'css' => 'sac',
        'js' => 'sac',
        'title' => 'Portal Ouvido e Saúde | Fale Conosco'
     ]
)

@extends('amp.layouts',
    [
        'css' => 'sac',
        'ampRouteName' => 'ampSac',
        'canonRouteName' => 'sac',
        'amp_components' => [
            ['lib' => ['name' => 'amp-form','version'=>'0.1']],
            ['lib' => ['name' => 'amp-mustache','version'=>'0.1']]
        ]
    ]
)

@section('header')
    @include('components.header',
    [
        'title'=> 'fale conosco',
        'active'=> (object)
        [
            'home'=>'',
            'indicacao'=>'',
            'blog'=>'',
            'historias'=>'',
            'sac'=>'--active'
        ]
    ])
@endsection

@section('content')
    @include('partials.sac')
@endsection

@section('footer')
    @include('components.footer')
@endsection