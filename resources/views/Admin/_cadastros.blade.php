{{-- Cadastros --}}
<div class="span4">
    <ul class="site-stats">
        @php
            $clique = \App\Option::where('key', '=', 'total_clique_btns_whatsapp-'.date('Y-m'))->first();
        @endphp
        @if ($clique)
            <li class="bg_lh">
                <i class="icon-phone-sign"></i>
                <strong>{{ $clique->value }}</strong>
                <small>Clique em botões de WhatsApp em {{ date('M-Y') }}</small>
            </li>
        @endif
        @php
            $cadastros = \App\Cadastro::
                        where('tipo_cadastro_id', '=', '1')
                        ->where('status', '=', '1')
                        ->whereBetween('created_at', [date('Y-m-1'), date('Y-m-'.date("t", mktime(0, 0, 0, date('m'), '01', date('Y'))))])
                        ->count();
        @endphp
        @if ($cadastros)
            <li class="bg_lh">
                <i class="icon-phone-sign"></i>
                <strong>{{ $cadastros }}</strong>
                <small>Total de cadastros de pacientes em {{ date('M-Y') }}</small>
            </li>
        @endif
        @php
            $fonos = \App\Cadastro::
                        where('tipo_cadastro_id', '=', '2')
                        ->where('status', '=', '1')
                        ->whereBetween('created_at', [date('Y-m-1'), date('Y-m-'.date("t", mktime(0, 0, 0, date('m'), '01', date('Y'))))])
                        ->count();
        @endphp
        @if ($fonos)
            <li class="bg_lh">
                <i class="icon-phone-sign"></i>
                <strong>{{ $fonos }}</strong>
                <small>Total de cadastros de fonoaudiologas em {{ date('M-Y') }}</small>
            </li>
        @endif
    </ul>
</div>
