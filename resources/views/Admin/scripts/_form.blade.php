<div class="control-group">
    <label class="control-label">Nome :</label>
    <div class="controls">
        {{ Form::text('name', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
    <label class="control-label">Código :</label>
    <div class="controls">
        {{ Form::textarea('code', null, ['class' => 'span11']) }}
    </div>
</div>

<div class="control-group">
  <label class="control-label">Locais :</label>
  <div class="controls">
    @foreach ($places as $place)
      <label class="span2">
        <input type="checkbox" name="places[]" value="{{ $place->id }}"
          {{ isset($script) && $script->places->contains($place->id) ? "checked" : null }}>
        {{ $place->descricao }}
      </label>
    @endforeach
  </div>
</div>

<div class="control-group">
  <label class="control-label">No topo :</label>
  <div class="controls">
    <input type="radio" name="in_top" value="0" checked> Não
    <input type="radio" name="in_top" value="1"
      {{ isset($script) && $script->in_top == 1 ? 'checked' : null }}> Sim
  </div>
</div>

<div class="control-group">
    <label class="control-label">Status :</label>
    <div class="controls">
        {{ Form::radio('status', 1) }} Ativo
        {{ Form::radio('status', 0, true) }} Inativo
    </div>
</div>

<div class="form-actions">
    {{ Form::submit('Salvar', ['class' => 'btn btn-success']) }}
</div>
