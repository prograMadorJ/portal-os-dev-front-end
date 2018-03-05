<div class="blog-footer">
    <h4>
        Leia por categoria
    </h4>
@foreach($categorias as $categoria)
    <div class="blog-footer__items">
        <div class="blog-footer__items--category">
            @include('Portal_OS.components.graphics.'.$categoria->slug)
            <span>
                {{$categoria->nome}}
            </span>
            <p>
                {{$categoria->descricao}}
            </p>

            <a href="#ler-mais">
                LER MAIS
            </a>
        </div>
    </div>
@endforeach
</div>
