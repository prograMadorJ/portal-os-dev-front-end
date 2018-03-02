<div class="posts-suggested">
    <div class="posts-suggested__title">
        <h4>
            VOCÊ TAMBÉM PODE GOSTAR:
        </h4>
    </div>
    @php
        $panels = 4;
    @endphp
    @for($i = 0; $i < $panels; $i++)
        <div class="posts-suggested__panel">
            <div class="posts-suggested__panel__image">
                <img src="{{ asset('portal-os/img/img-post.jpg') }}">
            </div>
            <div class="posts-suggested__panel__tag">
                <p>Saúde</p>
                <span>Há 1 hora</span>
            </div>
            <div class="posts-suggested__panel__post">
                <a href="">
                    Hábitos alimentares afetam audição
                </a>
            </div>
        </div>
    @endfor
</div>
