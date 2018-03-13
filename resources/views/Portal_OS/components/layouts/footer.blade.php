<footer class="footer">
    <div class="footer__logo">
        @include('Portal_OS.components.graphics.logo-blank')
    </div>
    <div class="footer__menu">
        <div class="footer__items">
            {{--*******************************************************************--}}
            {{--  linhas abaixo comentadas, aguardam implementação futura --}}
            {{--*******************************************************************--}}
            {{--<ul>--}}
                {{--<a href="#agendamento"><h5>AGENDE SUA CONSULTA</h5></a>--}}
            {{--</ul>--}}
            {{--<ul>--}}
                {{--<a href="#indique"><h5>INDIQUE</h5></a>--}}
                {{--<li>Como Participar</li>--}}
                {{--<li>Beneficíos</li>--}}
                {{--<li>Remuneração</li>--}}
                {{--<li>Cadastro</li>--}}
            {{--</ul>--}}
            <ul>
                <a href="{{route('blogIndex')}}"><h5>BLOG</h5></a>
                <li>Ouvido</li>
                <li>Nariz</li>
                <li>Garganta</li>
                <li>Pescoço</li>
                <li>Saúde</li>
            </ul>
            <ul>
                <a href="{{route('historias')}}"><h5>HISTÓRIAS</h5></a>
            </ul>
            <ul>
                <a href="{{route('sac')}}"><h5>FALE CONOSCO</h5></a>
                <li>Contato</li>
                <li>Telefone</li>
                <li>WhatsApp</li>
                <li>E-mail</li>
            </ul>
        </div>
        <div class="footer__social">
            <ul>
                <h5>SOCIAL</h5>
                <li>
                    @include('Portal_OS.components.share.sharing-panel',
                     [
                         'share_url' => route('blogIndex'),
                         'share_text' => "O portal Ouvido e Saúde é o site onde tem tudo que você precisa saber sobre sua saúde. Acesse agora!",
                         'share_hashtag' => str_slug('portal ouvido e saúde'),
                         'icon_facebook' => 'Portal_OS.components.graphics.icon-blank-facebook',
                         'icon_twitter' => 'Portal_OS.components.graphics.icon-blank-twitter',
                         'icon_google' => 'Portal_OS.components.graphics.icon-blank-google',
                         'icon_whatsapp' => 'Portal_OS.components.graphics.icon-blank-whatsapp'
                     ]
                    )
                </li>
            </ul>
        </div>
    </div>
</footer>
