<div class="span12">

    <table class="table table-bordered data-table text-center">

        <tr>
            <th>Artigos</th>
            <th>Abaixo da média</th>
            <th>Na média</th>
            <th>Otimizado</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>Meta Título</td>
            <td>
                <a href="{{ url('/site-admin/artigos?meta_titulo=A') }}">
                    <span class="badge badge-important">
                        {{ \App\Artigo::join('seos', 'artigos.seo_id', '=', 'seos.id')
                            ->where(\DB::raw('length(seos.meta_titulo)'), '<', (74*0.7))->count() }}
                    </span>
                </a>
            </td>
            <td>
                <a href="{{ url('/site-admin/artigos?meta_titulo=M') }}">
                    <span class="badge badge-warning">{{ \App\Artigo::join('seos', 'artigos.seo_id', '=', 'seos.id')
                        ->where(\DB::raw('length(seos.meta_titulo)'), '>=', (74*0.7))
                        ->where(\DB::raw('length(seos.meta_titulo)'), '<', (74-15))->count() }}
                    </span>
                </a>
            </td>
            <td><span class="badge badge-success">{{ \App\Artigo::join('seos', 'artigos.seo_id', '=', 'seos.id')
                        ->where(\DB::raw('length(seos.meta_titulo)'), '>=', (74-15))->count() }}</span></td>
            <td><span class="badge badge-inverse">{{ \App\Artigo::all()->count() }}</span></td>
        </tr>
        <tr>
            <td>Meta Descrição</td>
            <td>
                <a href="{{ url('/site-admin/artigos?meta_descricao=A') }}">
                    <span class="badge badge-important">{{ \App\Artigo::join('seos', 'artigos.seo_id', '=', 'seos.id')
                        ->where(\DB::raw('length(seos.meta_descricao)'), '<', (156*0.7))->count() }}
                    </span>
                </a>
            </td>
            <td>
                <a href="{{ url('/site-admin/artigos?meta_descricao=M') }}">
                    <span class="badge badge-warning">{{ \App\Artigo::join('seos', 'artigos.seo_id', '=', 'seos.id')
                        ->where(\DB::raw('length(seos.meta_descricao)'), '>=', (156*0.7))
                        ->where(\DB::raw('length(seos.meta_descricao)'), '<', (156-15))->count() }}
                    </span>
                </a>
            </td>
            <td><span class="badge badge-success">{{ \App\Artigo::join('seos', 'artigos.seo_id', '=', 'seos.id')
                        ->where(\DB::raw('length(seos.meta_descricao)'), '>=', (156-15))->count() }}</span></td>
            <td><span class="badge badge-inverse">{{ \App\Artigo::all()->count() }}</span></td>
        </tr>

    </table>

</div>

@section('css-1')
    <style media="screen">
        table.text-center td {
            text-align: center !important;
        }
    </style>
@endsection
