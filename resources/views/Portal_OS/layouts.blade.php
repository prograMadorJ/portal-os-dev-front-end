@php
    $amp_status = config('amp.status');
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" {{($amp_status) ? 'amp' : ''}}>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link href="https://unpkg.com/vuetify@1.0.1/dist/vuetify.min.css" rel="stylesheet">--}}
    @if($amp_status)
        @yield('amp-head')
    @else
        @if (isset($css) && $css)
            <link rel="stylesheet" href="{{ asset('/portal-os/css/pages/'.$css.'.css') }}"/>
        @endif
    @endif
    <title>{{$title or 'Portal Ouvido e Saúde'}}</title>
</head>
<body>
@yield('header')
<div class="container">
    @yield('content')
</div>
@yield('footer')
{{--<script src="https://unpkg.com/babel-polyfill/dist/polyfill.min.js"></script>--}}
{{--<script src="https://unpkg.com/vue/dist/vue.js"></script>--}}
{{--<script src="https://unpkg.com/vuetify@1.0.0/dist/vuetify.min.js"></script>--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
</body>
</html>
