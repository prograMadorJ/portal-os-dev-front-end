<div class="blog-footer">
    <h4>
        Leia por categoria
    </h4>
    <div class="blog-footer__items">
        @foreach($categorias as $categoria)
            <div class="blog-footer__items--category">
                <a href="{{route('categoriasBlog',$categoria->nome)}}">
                    <img src="{{asset('portal-os/img'.$categoria->image)}}.png" alt="{{$categoria->nome}}">
                    <span>{{$categoria->nome}}</span>
                </a>
                <p>
                    {{$categoria->descricao}}
                </p>

                <a href="{{route('categoriasBlog',$categoria->nome)}}">
                    LER MAIS
                </a>
            </div>
        @endforeach
    </div>
</div>
