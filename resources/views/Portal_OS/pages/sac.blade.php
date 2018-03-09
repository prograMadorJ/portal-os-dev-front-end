@extends('Portal_OS.layouts',
    [
        'css' => 'sac',
        'js' => 'sac',
        'title' => 'Portal Ouvido e Saúde | Fale Conosco'
     ]
)

@extends('Portal_OS.amp.layouts',
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
    @include('Portal_OS.components.header',
    [
        'title'=> 'fale conosco',
        'active'=> 'sac'
    ])
@endsection

@section('content')
    @include('Portal_OS.partials.sac')
@endsection

@section('footer')
    @include('Portal_OS.components.footer')
@endsection