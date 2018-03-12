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
    @yield('head-scripts')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
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
@yield('footer-scripts')
</body>
</html>
