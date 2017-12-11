<div style="border: 1px solid red; margin-bottom:15px;" id="media{{ isset($md) ? $md->id : null }}">
    <div class="control-group">
        <label for="" class="control-label">Arquivo :</label>
        <div class="controls">
            @if (isset($md))
    			@if ($md->media->tipo_media_id == 1)
    				<p>
    					<img src="{{ $md->media->arquivo() }}" style="width:256px;">
    				</p>
                    <input type="hidden" name="media_id[]" value="{{ $md->media->id }}">
    			@endif
    		@endif
            @if (!isset($md))
                <input type="file" name="{{ isset($md) ? 'media_derivatives_delete[]' : 'media_derivatives[]' }}">
            @endif
        </div>
    </div>

    <div class="control-group">
        <label for="" class="control-label">Tamanho da tela :</label>
        <div class="controls">
            <select class="span5" name="{{ isset($md) ? 'screen_delete[]' : 'screen[]' }}" {{ isset($md) ? 'disabled' : null }}>
                <option value disabled selected>Escolha o tamanho da tela</option>
                @php
                    $screens = array('xs' => '<756px', 'sm' => '>756px', 'md' => '>992px', 'lg' => '>1200px');
                @endphp
                @foreach ($screens as $key => $value)
                    <option value="{{ $key }}" {{ (isset($md) && $md->screen == $key) ? 'selected' : null }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if (isset($md))
        <div class="control-group">
            <div class="controls">
                <button type="button" data-id="{{ $md->id }}" id="btn-remove" class="btn btn-danger"><span class="icon-remove"></span> Remover</button>
            </div>
        </div>
    @endif
</div>
