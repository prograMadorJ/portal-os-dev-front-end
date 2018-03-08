@extends('Portal_OS.layouts',
    [
        'css' => 'error404',
        'js' => 'error404',
        'title' => 'Portal Ouvido e Saúde | Recurso não está disponivel no momento'
    ]
)


@section('header')
    @include('Portal_OS.components.header',
    [
        'title'=> 'erro',
        'active'=> ''
    ])
@endsection

@section('content')
    @include('Portal_OS.partials.error404')
@endsection

@section('footer')
    @include('Portal_OS.components.footer')
@endsection