@section('header-metatags')
    @php $metatags = (object)$metatags; @endphp
    <meta property="og:url" content="{{
    isset($metatags) && isset($metatags->url) ?
    $metatags->url :
    config('app.url')
}}"/>
    <meta property="description" content="{{
    isset($metatags) && isset($metatags->description) ?
    $metatags->description :
    $description_default = "O portal Ouvido e Saúde é o site onde tem tudo que você precisa saber sobre sua saúde. Acesse agora!"
}}"/>
    <meta property="og:description" content="{{
    isset($metatags) && isset($metatags->og_description) ?
    $metatags->og_description :
    (
        isset($metatags->description) ?
        $metatags->description :
        $description_default
    )
}}"/>
    <meta property="og:image" content="{{
    isset($metatags) && isset($metatags->og_image) ?
    $metatags->og_image :
    (
        isset($metatags->image) ?
        $metatags->image :
        "icon.png"
    )
}}"/>
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta name="mobile-web-app-capable" content="yes">
@endsection