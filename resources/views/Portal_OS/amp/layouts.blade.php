@section('amp-head')
    @if(config('amp.status'))
        {{-- AMP BOILERPLATE & AMP NOSCRIPT - INLINE --}}
        <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
        {{-- AMP SCRIPT --}}
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        {{-- AMP COMPONENTS --}}
        @php $amp_components = (object)$amp_components; @endphp
        @if (isset($amp_components))
            @foreach ($amp_components as $amp_component)
                @php $lib = (object)$amp_component['lib'] @endphp
                @if(isset($lib) && $lib->name !== '' && $lib->version !== '')
                    @if($lib->name == 'amp-mustache')
                        <script async custom-template="{{$lib->name}}"
                                src="https://cdn.ampproject.org/v0/{{$lib->name}}-{{$lib->version}}.js"></script>
                    @else
                        <script async custom-element="{{$lib->name}}"
                                src="https://cdn.ampproject.org/v0/{{$lib->name}}-{{$lib->version}}.js"></script>
                    @endif
                @endif
            @endforeach
        @endif
        {{-- AMP STYLE CUSTOM --}}
        <style amp-custom>
            @php
                readfile( getcwd() . "/css/pages/$css.css");
            @endphp
        </style>
        {{-- AMP MANDATORY --}}
        <link rel="amphtml" href="{{ $ampRouteName}}">
        <link rel="canonical" href="{{ $canonRouteName }}">
    @endif
@endsection