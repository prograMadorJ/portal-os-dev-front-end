@foreach ($media as $m)
    <div class="span2" style="border: 1px solid {{ (isset($media_save) && $m->id == $media_save->id) ? '#4bb8ff' : '#b3b3b3' }};margin-bottom:30px;border-radius:5px;">
        <input type="radio" name="{{ isset($field_name) ? $field_name : 'media_id' }}" value="{{ $m->id }}" {{ (isset($media_save) && $m->id == $media_save->id) ? 'checked' : null }}>
        <img src="{{ $m->arquivo() }}" style="height:50px;" title="{{ $m->titulo }}">
    </div>
@endforeach
