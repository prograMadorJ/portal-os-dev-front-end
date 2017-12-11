<div class="controls" style="overflow-y:scroll;height: 200px">
    <div class="span10" style="margin-bottom:30px">
        <input type="text" name="search_media" class="span10" placeholder="Buscar imagens por ID ou Título" data-field-name="{{ $field_name }}">
    </div>
    <div id="search_{{ $field_name }}">
        @include('Admin.media._filter_each')
    </div>
</div>
