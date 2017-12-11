@foreach ($artigos as $artigo)
    <div class="span5">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon">{{ Form::radio('artigo_id', $artigo->id) }}</span>
                <h5>{{ $artigo->titulo }}</h5>
            </div>
            <div class="widget-content">
                <?php $artigo->recuperar_url(); ?>
                {{ Html::image($artigo->imagem, null, ['style' => 'height:150px']) }}
            </div>
        </div>
    </div>
@endforeach
