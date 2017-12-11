<p id="msg-1">
    <span class="msg-block">
        <img src="/admin/img/demo/{{ $historicos_contato->from_model == 'User' ? 'av1.jpg' : 'av2.jpg' }}" alt="">
        {!! $historicos_contato->from_model == 'User' ? ("<strong>".$historicos_contato->user->name."</strong>") : $historicos_contato->cadastro->nome !!}
        <span class="time">- {{ UtilsHelper::data_completa($historicos_contato->created_at) }}</span>
        <span class="msg">{!! nl2br($historicos_contato->mensagem) !!}</span>
    </span>
</p>
