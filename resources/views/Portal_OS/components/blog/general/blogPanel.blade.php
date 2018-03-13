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
            <a href="{{ route('blogPost', $rank[0]->url) }}">
                {{ $rank[0]->titulo }}
            </a>
        </div>
        <div class="blog-panel__body--content">
            <span>
                2
            </span>
            <a href="{{ route('blogPost', $rank[1]->url) }}">
                {{ $rank[1]->titulo }}
            </a>
        </div>
        <div class="blog-panel__body--content">
            <span>
                3
            </span>
            <a href="{{ route('blogPost', $rank[2]->url) }}">
                {{ $rank[2]->titulo }}
            </a>
        </div>
        <div class="blog-panel__body--content">
            <span>
                4
            </span>
            <a href="{{ route('blogPost', $rank[3]->url) }}">
                {{ $rank[3]->titulo }}
            </a>
        </div>
        <div class="blog-panel__body--content">
            <span>
                5
            </span>
            <a href="{{ route('blogPost', $rank[4]->url) }}">
                {{ $rank[4]->titulo }}
            </a>
        </div>
    </div>
</div>
