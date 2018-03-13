@if(isset($icon_facebook) && $icon_facebook)
<a href="http://www.facebook.com/sharer.php?u={{$share_url}}&quote={{$share_text}} - Portal Ouvido e Saúde" target="_blank">
    @include($icon_facebook)
</a>
@endif

@if(isset($icon_twitter) && $icon_twitter)
<a href="https://twitter.com/share?url={{$share_url}}&text={{$share_text}}&hashtags={{$share_hashtag}}" target="_blank">
    @include($icon_twitter)
</a>
@endif

@if(isset($icon_google) && $icon_google)
<a href="https://plus.google.com/share?url={{$share_url}}" target="_blank">
    @include($icon_google)
</a>
@endif

@if(isset($icon_whatsapp) && $icon_whatsapp)
<a href="whatsapp://send?text={{$share_text}} - {{$share_url}}" target="_blank">
    @include($icon_whatsapp)
</a>
@endif