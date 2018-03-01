<div class="posts-suggested">
    <div class="posts-suggested__content">
        <div class="posts-suggested__title">
            <p>
                Você também pode gostar:
            </p>
        </div>
        <div class="posts-suggested__panel">
            @php
                $panels = 4;
            @endphp

            @for($i = 0; $i < $panels; $i++)
                @include('components.blog.single.components.postSuggestionPanel')
            @endfor
        </div>
    </div>
</div>
