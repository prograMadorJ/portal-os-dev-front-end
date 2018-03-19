<div class="blog-footer">
    <h4>
        Leia por categoria
    </h4>
    <div class="blog-footer__items">
        @foreach($categorias as $categoria)
            <div class="blog-footer__items--category">
                <a class="blog-footer__items--category-icon" href="{{route('categoriasBlog',$categoria->nome)}}">
                    <img src="{{asset('portal-os/img'.$categoria->image)}}.png" alt="{{$categoria->nome}}">
                    <span>{{$categoria->nome}}</span>
                </a>
                <p class="blog-footer__items--category-description">
                    {{$categoria->descricao}}
                </p>

                <a class="blog-footer__items--category-link" href="{{route('categoriasBlog',$categoria->nome)}}">
                    LER MAIS
                </a>
            </div>
        @endforeach
    </div>
</div>
