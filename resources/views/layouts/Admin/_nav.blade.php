<!--Header-part-->
<div id="header">
    <h1><a href="{{ url('/') }}" target="_blank">Site Direito de Ouvir</a></h1>
</div>
<!--close-Header-part-->

@if (\Auth::user())
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bem-vindo {{ Auth::user()->name }}</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/site-admin/usuarios/'.Auth::user()->id) }}"><i class="icon-user"></i> Meus dados</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url("/logout") }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            @if (Auth::user()->pode('User', 'index'))
                <li class=""><a title="" href="{{ url('/site-admin/usuarios') }}"><i class="icon icon-user"></i> <span class="text">Usuários</span></a></li>
            @endif
            @if (Auth::user()->pode('Grupo', 'index'))
                <li class="dropdown" id="permissoes"><a href="#" data-toggle="dropdown" data-target="#permissoes" class="dropdown-toggle"><span class="icon icon-cog"></span> Controle de Acesso</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/site-admin/grupos') }}"><span class="icon icon-group"></span> Grupos de Usuário</a></li>
                        <li><a href="{{ url('/site-admin/permissoes') }}"><span class="icon icon-key"></span> Permissões</a></li>
                        <li><a href="{{ url('/site-admin/itens_permissoes') }}"><span class="icon icon-reorder"></span> Itens Permissões</a></li>
                        <li><a href="{{ url('/site-admin/grupos_itens_permissoes') }}"><span class="icon icon-group"></span><span class="icon icon-key"></span>  Permissões para Grupos</a></li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->grupo->nome == 'Admin')
                <li class="dropdown" id="opcoes"><a href="#" data-toggle="dropdown" data-target="#opcoes" class="dropdown-toggle"><span class="icon icon-cog"></span> Opções</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/site-admin/locais') }}"><span class="icon icon-globe"></span> Locais</a></li>
                        <li><a href="{{ url('/site-admin/tipo_media') }}"><span class="icon icon-camera"></span> Tipo Media</a></li>
                    </ul>
                </li>
            @endif
            <li class=""><a title="" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </div>
    <!--close-top-Header-menu-->

    <!--sidebar-menu-->
    <div id="sidebar"><a href="{{ url('/site-admin') }}" class="visible-phone"><i class="icon icon-home"></i> Home</a>
        <ul>
            <li><a href="{{ url('/site-admin') }}"><span class="icon icon-home"></span> Home</a> </li>
            @if (Auth::user()->pode('Artigo', 'index'))
                <li class="submenu"><a  href="#">
                    <span class="icon icon-align-justify"></span> Publicações</a>
                    <ul>
                        @if (Auth::user()->pode('Artigo', 'index'))
                            <li><a href="{{ url('/site-admin/artigos') }}"><span class="icon icon-font"></span> Artigos</a></li>
                        @endif
                        @if (Auth::user()->pode('Categoria', 'index'))
                            <li><a href="{{ url('/site-admin/categorias') }}"><span class="icon icon-list"></span> Categorias</a></li>
                        @endif
                        @if (Auth::user()->pode('Destaque', 'index'))
                            <li><a href="{{ url('/site-admin/destaques') }}"><span class="icon icon-bullhorn"></span> Destaques</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (Auth::user()->pode('Produto', 'index'))
            <li class="submenu"><a  href="#">
                <span class="icon icon-shopping-cart"></span> Produtos</a>
                <ul>
                    @if (Auth::user()->pode('Produto', 'index'))
                        <li><a href="{{ url('/site-admin/produtos') }}"><span class="icon icon-tags"></span> Produtos</a></li>
                    @endif
                    @if (Auth::user()->pode('Design', 'index'))
                        <li><a href="{{ url('/site-admin/designs') }}"><span class="icon icon-heart"></span> Design</a></li>
                    @endif
                    @if (Auth::user()->pode('Tecnologia', 'index'))
                        <li><a href="{{ url('/site-admin/tecnologias') }}"><span class="icon icon-cogs"></span> Tecnologia</a></li>
                    @endif
                    @if (Auth::user()->pode('QualidadesSonora', 'index'))
                        <li><a href="{{ url('/site-admin/qualidades_sonoras') }}"><span class="icon icon-volume-up"></span> Qualidade Sonora</a></li>
                    @endif
                    @if (Auth::user()->pode('Acessorio', 'index'))
                        <li><a href="{{ url('/site-admin/acessorios') }}"><span class="icon icon-phone"></span> Acessórios</a></li>
                    @endif
                    @if (Auth::user()->pode('ProdutosDestaque', 'index'))
                        <li><a href="{{ url('/site-admin/produtos_destaques') }}"><span class="icon icon-bullhorn"></span> Destaques</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if (Auth::user()->pode('Media', 'index'))
                <li><a href="{{ url('/site-admin/media') }}"><span class="icon icon-camera"></span> Media</a></li>
            @endif
            @if (Auth::user()->pode('Banner', 'index'))
                <li><a href="{{ url('/site-admin/banners') }}"><span class="icon icon-picture"></span> Banners</a></li>
            @endif
            @if (Auth::user()->pode('Franquia', 'index'))
                <li class="submenu">
                    <a href="#"><span class="icon icon-briefcase"></span> Franquias</a>
                    <ul>
                        @if (Auth::user()->pode('Franquia', 'index'))
                            <li><a href="{{ url('/site-admin/franquias') }}"><span class="icon icon-briefcase"></span> Franquia</a></li>
                        @endif
                        @if (Auth::user()->pode('FotosFranquia', 'index'))
                            <li><a href="{{ url('/site-admin/fotos_franquias') }}"><span class="icon icon-picture"></span> Fotos da Franquia</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (Auth::user()->pode('Cadastro', 'index'))
                <li class="submenu">
                    <a href="#"><span class="icon icon-group"></span> Cadastros</a>
                    <ul>
                        <li><a href="{{ url('/site-admin/cadastros') }}"><span class="icon icon-group"></span> Cadastros</a></li>
                        <li><a href="{{ url('/site-admin/tipo_cadastros') }}"><span class="icon icon-group"></span> Tipos dos Cadastros</a></li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->pode('Questao', 'index'))
                <li><a href="{{ url('/site-admin/questoes') }}"><span class="icon icon-question-sign"></span> Perguntas Frequentes</a></li>
            @endif
            @if (Auth::user()->pode('Depoimento', 'index'))
                <li><a href="{{ url('/site-admin/depoimentos') }}"><span class="icon icon-comments"></span> Depoimentos</a></li>
            @endif
            @if (Auth::user()->pode('Pergunta', 'index'))
                <li class="submenu">
                    <a href="#"><span class="icon icon-question-sign"></span> Testes</a>
                    <ul>
                        <li><a href="{{ url('/site-admin/perguntas') }}"><span class="icon icon-question-sign"></span> Perguntas</a></li>
                        @if (Auth::user()->pode('Alternativa', 'index'))
                            <li><a href="{{ url('/site-admin/alternativas') }}"><span class="icon icon-ok-sign"></span> Alternativas</a></li>
                        @endif
                        @if (Auth::user()->pode('Resposta', 'index'))
                            <li><a href="{{ url('/site-admin/respostas') }}"><span class="icon icon-info-sign"></span> Respostas escolhidas</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (Auth::user()->pode('Redirect', 'index'))
                <li><a href="{{ url('/site-admin/redirects') }}"><span class="icon icon-retweet"></span> Redirecionamentos</a></li>
            @endif
            @if (Auth::user()->pode('Curriculo', 'index'))
                <li><a href="{{ url('/site-admin/curriculos') }}"><span class="icon-edit"></span> Curriculos</a></li>
            @endif
            @if (Auth::user()->pode('Script', 'index'))
              <li><a href="{{ url('/site-admin/scripts') }}"><span class="icon-edit"></span> Scripts</a></li>
            @endif
            @if (Auth::user()->pode('SpamsList', 'index'))
              <li><a href="{{ url('/site-admin/spams_lists') }}"><span class="icon-remove-circle"></span> Lista de SPAMs</a></li>
            @endif
        </ul>
    </div>
    <!--sidebar-menu-->
@endif
