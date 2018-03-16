<div class="blog-panel">
    <div class="blog-panel__heading">
        <p>
            Mais lidas
        </p>
    </div>

    <div class="blog-panel__body">
        @for($i = 0; $i < 5; $i++)
            <div class="blog-panel__body--content">
                <span>
                    {{ $i +1 }}
                </span>
                <a href="{{ route('blogPost', $rank[$i]->url) }}">
                    {{ $rank[$i]->titulo }}
                </a>
            </div>
        @endfor
    </div>
</div>
