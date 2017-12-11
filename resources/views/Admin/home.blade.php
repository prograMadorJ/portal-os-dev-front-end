@extends('layouts.Admin.app')

@section('content')

    <div class="container-fluid">

        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                @if (Auth::user()->pode('Artigo', 'index'))
                    <li class="bg_lg">
                        <a href="/site-admin/artigos"> <i class="icon-font"></i>
                            <span class="label label-default">{{ count($artigos_publicados) }}</span>
                            Artigos
                        </a>
                    </li>
                @endif
                @if (Auth::user()->pode('Produto', 'index'))
                    <li class="bg_lb">
                        <a href="/site-admin/produtos"> <i class="icon-tags"></i>
                            <span class="label label-default">{{ \App\Produto::where('status', '=', '1')->count() }}</span>
                            Produtos
                        </a>
                    </li>
                @endif
                @if (Auth::user()->pode('Banner', 'index'))
                    <li class="bg_ly">
                        <a href="/site-admin/banners"> <i class="icon-picture"></i>
                            <span title="Banners Ativo" class="label label-default">
                                {{ \App\Banner::where('periodo_inicio', '<=', date('Y-m-d H:i:s'))
                                          ->where('periodo_final', '>=', date('Y-m-d H:i:s'))->
                                          where('status', '=', '1')->count() }}</span>
                            Banners
                        </a>
                    </li>
                @endif
                @if (Auth::user()->pode('Media', 'index'))
                    <li class="bg_lo">
                        <a href="/site-admin/media"> <i class="icon-camera"></i>
                            <span class="label label-default">{{ \App\Media::where('status', '=', '1')->count() }}</span>
                            Media
                        </a>
                    </li>
                @endif
                @if (Auth::user()->pode('Depoimento', 'index'))
                    <li class="bg_lr">
                        <a href="{{ url('/site-admin/depoimentos/cadastros') }}">
                            <i class="icon-comments"></i>
                            <span class="label label-default">{{ \App\Cadastro::where('tipo_cadastro_id', '=', '3')->where('status', '=', '1')->count() }}</span>
                            Depoimentos
                        </a>
                    </li>
                @endif
            </ul>
        </div>

        <div class="row-fluid">
            @if (Auth::user()->pode('Relatorio', 'index'))
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-bar-chart"></i></span>
                        <h5>Relatórios</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">

                            @include ("Admin._cadastros")

                            @include ("Admin._banners")

                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row-fluid">
            @if (Auth::user()->pode('Relatorio', 'index') || Auth::user()->pode('Artigo', 'index'))
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-bar-chart"></i></span>
                        <h5>Relatórios para otimização do site</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">

                            @include ("Admin._imagens")

                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if (Auth::user()->pode('Relatorio', 'index') || Auth::user()->pode('Artigo', 'index'))
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-bar-chart"></i></span>
                        <h5>Relatórios para SEO</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">

                            @include ("Admin._seo")

                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection
