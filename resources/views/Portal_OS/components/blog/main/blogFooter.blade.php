<div class="blog-footer">
    <h4>
        Leia por categoria
    </h4>
    <div class="blog-footer__items">
        @foreach($categorias as $categoria)
            <div class="blog-footer__items--category">
                <img src="{{asset('portal-os/img'.$categoria->image)}}.png" alt="{{$categoria->nome}}">
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
        @endforeach
    </div>
</div>
