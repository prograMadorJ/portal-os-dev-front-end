@foreach($depoimentos as $depoimento)
<div class="storiesPanel" id="storiesPanel" name="storiesPanel">
    <div class="storiesPanel__imageHolder" id="storiesPanel__imageHolder" name="storiesPanel__imageHolder">
        <img src="{{ asset('portal-os/img/default_profile.jpeg') }}">
    </div>
    <div class="storiesPanel__text">
        <h3 class="storiesPanel__name">
            {{$depoimento->nome}}
        </h3>
        <p class="storiesPanel__city">
            {{$depoimento->local}}
        </p>
        <span class="storiesPanel__story">
            {{$depoimento->conteudo}}
        </span>
    </div>
</div>
@endforeach