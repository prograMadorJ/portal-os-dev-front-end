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
                <a href="{{route('blog')}}"><h5>BLOG</h5></a>
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
                    <a href="#facebook">@include('Portal_OS.components.graphics.icon-blank-facebook')</a>
                    <a href="#twitter">@include('Portal_OS.components.graphics.icon-blank-twitter')</a>
                    <a href="#google">@include('Portal_OS.components.graphics.icon-blank-google')</a>
                    <a href="#whatsapp">@include('Portal_OS.components.graphics.icon-blank-whatsapp')</a>
                </li>
            </ul>
        </div>
    </div>
</footer>