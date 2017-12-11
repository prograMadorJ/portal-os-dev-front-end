@if (app()->environment() == 'local')
    <div class="environment">
        <span>Ambiente de development: {{ app()->environment() }}</span>
    </div>
@elseif (app()->environment() == 'staging')
    <div class="environment">
        <span>Ambiente de homologação: {{ app()->environment() }}</span>
    </div>
@endif
