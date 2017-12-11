<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (app()->environment() == 'production')
        <meta name="robots" rel="index, follow">
    @else
        <meta name="robots" rel="noindex, nofollow">
    @endif

    <title>@yield('meta_title', config('app.name', 'Direito de Ouvir'))</title>

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
  {{-- Rotinas de adição de scripts no bottom --}}
  @if (isset($scripts))
    @foreach ($scripts as $script)
      @if ($script->in_top == 1)
        @foreach ($script->places as $place)
          @if ($place->name === $__env->yieldContent('local'))
            <!-- {{ $script->name }} -->
            {!! $script->code !!}
          @endif
        @endforeach
      @endif
    @endforeach
  @endif

  @include('layouts._header')

  @if (session()->exists('success'))
    <div class="success">
      <p>{{ session()->get('success') }}</p>
    </div>
  @endif

  @yield('content')

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
    ]) !!};
  </script>

  <script src="/js/app.js"></script>

  {{-- Rotinas de adição de scripts no bottom --}}
  @if (isset($scripts))
    @foreach ($scripts as $script)
      @if ($script->in_top == 0)
        @foreach ($script->places as $place)
          @if ($place->name === $__env->yieldContent('local'))
            <!-- {{ $script->name }} -->
            {!! $script->code !!}
          @endif
        @endforeach
      @endif
    @endforeach
  @endif

  @include('layouts._environment')
</body>
</html>
