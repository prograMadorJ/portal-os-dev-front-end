@extends('Portal_OS.layouts',
    [
        'css'=>'post',
        'js'=>'post',
        'title'=>'Portal Ouvido e Saúde | Post'
    ]
)

@extends('Portal_OS.amp.layouts',
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
    @include('Portal_OS.components.header',
    [
        'title' => 'post',
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
    @include('Portal_OS.partials.post')
@endsection

@section('footer')
    @include('Portal_OS.components.footer')
@endsection