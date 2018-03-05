<div class="blog-panel">
    <div class="blog-panel__heading">
        <p>
            Mais lidas
        </p>
    </div>

    <div class="blog-panel__body">
        <div class="blog-panel__body--content">
            <span>
                1
            </span>
            <a href="{{ route('blogPost', $rank[0]->slug) }}">
                {{ $rank[0]->titulo }}
            </a>
        </div>
        <div class="blog-panel__body--content">
            <span>
                2
            </span>
            <a href="{{ route('blogPost', $rank[1]->slug) }}">
                {{ $rank[1]->titulo }}
            </a>
        </div>
        <div class="blog-panel__body--content">
            <span>
                3
            </span>
            <a href="{{ route('blogPost', $rank[2]->slug) }}">
                {{ $rank[2]->titulo }}
            </a>
        </div>
        <div class="blog-panel__body--content">
            <span>
                4
            </span>
            <a href="{{ route('blogPost', $rank[3]->slug) }}">
                {{ $rank[3]->titulo }}
            </a>
        </div>
        <div class="blog-panel__body--content">
            <span>
                5
            </span>
            <a href="{{ route('blogPost', $rank[4]->slug) }}">
                {{ $rank[4]->titulo }}
            </a>
        </div>
    </div>
</div>
