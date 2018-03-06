<header class="header">
    <div class="header__nav-icon">
        @include('Portal_OS.components.graphics.font-awesome.icon-bars')
    </div>
    <div class="header__logo">
        @include('Portal_OS.components.graphics.logo-blank')
    </div>
    <nav class="header__navbar">
        <ul>
            {{--*******************************************************************--}}
            {{--  linhas abaixo comentadas, aguardam implementação futura --}}
            {{--*******************************************************************--}}

            {{--<li><a class="header__navbar__item{{$active->home}}" href="{{route('home')}}">AGENDE SUA CONSULTA</a></li>--}}
            {{--<li><a class="header__navbar__item{{$active->indicacao}}" href="{{route('indicacao')}}">INDIQUE</a></li>--}}
            <li><a class="header__navbar__item{{$active->blog}}" href="{{route('blogIndex')}}">BLOG</a></li>
            <li><a class="header__navbar__item{{$active->historias}}" href="{{route('historias')}}">HISTÓRIAS REAIS</a></li>
            <li><a class="header__navbar__item{{$active->sac}}" href="{{route('sac')}}">FALE CONOSCO</a></li>
        </ul>
    </nav>
    {{--*******************************************************************--}}
    {{--  linhas abaixo comentadas, aguardam implementação futura --}}
    {{--*******************************************************************--}}
    {{--<v-navigation-drawer--}}
            {{--temporary--}}
            {{--v-model="drawer"--}}
            {{--absolute--}}
    {{-->--}}
    {{--</v-navigation-drawer>--}}
    {{--<div class="header__access">--}}
    {{--<div class="header__access__register">--}}
    {{--<a href="#cadastro">--}}
    {{--@include('components.graphics.font-awesome.icon-user')--}}
    {{--CADASTRAR--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="header__access__entry">--}}
    {{--<a href="#entrar">ENTRAR</a>--}}
    {{--</div>--}}
    {{--</div>--}}
</header>
