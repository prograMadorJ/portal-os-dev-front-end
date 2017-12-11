<div class="span12">
    <ul class="unstyled">
        @if (\Auth::user()->pode('Artigo', 'index'))
            @php
                // Verificação para imagens otimizadas
                $t = 0;
                foreach ($artigos as $artigo) {
                    if ($artigo->imagem_tamanho < 100001) {
                        $t++;
                    }
                }
                if ($t > 0) {
                    $percent = ($t *  100) / count($artigos);
                } else {
                    $percent = 0;
                }
            @endphp
            <li>
                <a href="{{ url('/site-admin/artigos?size=1') }}">
                    <span class="icon24 icomoon-icon-arrow-up-2 green"></span> {{ number_format($percent, 2, ',', '.') }}% de Imagens otimizadas em Artigos
                    <span class="pull-right strong">{{ $t }}</span>
                    <div class="progress progress-striped {{ ($percent >= 75) ? ('progress-success') : ($percent >= 35 ? 'progress-warning' : 'progress-danger')  }}">
                        <div style="width: {{ $percent }}%;" class="bar"></div>
                    </div>
                </a>
            </li>
        @endif
    </ul>
</div>
