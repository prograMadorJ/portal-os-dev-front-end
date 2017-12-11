<div class="span8">

    <table class="table table-bordered data-table">
        <thead>
            <th>Banner</th>
            <th>Data de publicação</th>
            <th>Data de Expiração</th>
            <th>Cliques</th>
        </thead>
        <tbody>
            @php
                $banners = \App\Banner::where('periodo_inicio', '<=', DB::raw("NOW()"))
                    ->where('periodo_final', '>=', DB::raw("NOW()"))
                    ->where('status', '=', '1')
                    ->orderBy('periodo_final','desc')->get();
            @endphp
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->nome }}</td>
                    <td>{{ UtilsHelper::data_completa($banner->periodo_inicio) }}</td>
                    <td>{{ UtilsHelper::data_completa($banner->periodo_final) }}</td>
                    <td style="text-align:center;"><span class="label label-info">{{ count($banner->banners_estatisticas) }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
