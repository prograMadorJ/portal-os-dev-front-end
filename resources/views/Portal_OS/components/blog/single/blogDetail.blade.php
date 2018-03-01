    {{--@foreach($posts as $post)--}}
    {{--@php $date = date_create($post->publicacao) @endphp--}}
    <div class="blog-detail" id="blog-detail">
        <div class="blog-detail__title">
            {{--@foreach($post->categorias as $cat)--}}
            <span class="blog-detail__category">
                    {{--{{ $cat->nome }}--}}
                saude
                </span>
            {{--@endforeach--}}
            <span class="blog-detail__date">
                {{--{{ date_format($date,"d/m/y - H") }}H--}}
                10/10/18 - 1H
            </span>
            <h3>
                {{--{{ $post->titulo }}--}}
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </h3>
        </div>
        <div class="blog-detail__resume">
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor laboriosam modi nesciunt obcaecati quis rerum soluta! Adipisci aliquid molestiae quisquam vel voluptas. Amet architecto assumenda labore magnam nostrum odio repellat.</span>
        </div>
        <div class="blog-detail__image">
            {{--@if(isset($post->media_id))--}}
            {{--<img src="{{ asset('img/post-img/' . $post->media->arquivo) }}">--}}
            {{--@else--}}
            {{--SEM IMAGEM - COLOCAR UMA IMAGEM DEFAULT PARA OS POSTS SEM IMAGEM??--}}
            {{--@endif--}}
            <img src="{{asset('portal-os/img/img-post.jpg')}}">
        </div>
        <div class="blog-detail__social">
            <a href="#facebook">@include('Portal_OS.components.graphics.icon-facebook')</a>
            <a href="#twitter">@include('Portal_OS.components.graphics.icon-twitter')</a>
            <a href="#google">@include('Portal_OS.components.graphics.icon-google')</a>
            <a href="#whatsapp">@include('Portal_OS.components.graphics.icon-whatsapp')</a>
        </div>
        <div class="blog-detail__content">
            <p>
                {{--{{ $post->resumo }}--}}
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consequatur, dolore dolores illum ipsum labore nisi nostrum pariatur soluta tenetur ullam voluptas voluptatum! Architecto cumque dolorum exercitationem officia ratione!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores cupiditate doloribus dolorum esse id illo iste iusto maxime, minima nemo quaerat, quas repellendus reprehenderit sequi suscipit tenetur vitae voluptatem?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto autem dicta doloremque eaque et facilis hic, incidunt ipsa porro quia quod ratione rerum tenetur unde ut, voluptatibus voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque eos numquam qui quisquam quo sit? Dolorum exercitationem iusto magni obcaecati quo reiciendis sint! Cupiditate dignissimos in ipsum sapiente veniam!

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consequatur, dolore dolores illum ipsum labore nisi nostrum pariatur soluta tenetur ullam voluptas voluptatum! Architecto cumque dolorum exercitationem officia ratione!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores cupiditate doloribus dolorum esse id illo iste iusto maxime, minima nemo quaerat, quas repellendus reprehenderit sequi suscipit tenetur vitae voluptatem?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto autem dicta doloremque eaque et facilis hic, incidunt ipsa porro quia quod ratione rerum tenetur unde ut, voluptatibus voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque eos numquam qui quisquam quo sit? Dolorum exercitationem iusto magni obcaecati quo reiciendis sint! Cupiditate dignissimos in ipsum sapiente veniam!

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consequatur, dolore dolores illum ipsum labore nisi nostrum pariatur soluta tenetur ullam voluptas voluptatum! Architecto cumque dolorum exercitationem officia ratione!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores cupiditate doloribus dolorum esse id illo iste iusto maxime, minima nemo quaerat, quas repellendus reprehenderit sequi suscipit tenetur vitae voluptatem?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto autem dicta doloremque eaque et facilis hic, incidunt ipsa porro quia quod ratione rerum tenetur unde ut, voluptatibus voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque eos numquam qui quisquam quo sit? Dolorum exercitationem iusto magni obcaecati quo reiciendis sint! Cupiditate dignissimos in ipsum sapiente veniam!

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consequatur, dolore dolores illum ipsum labore nisi nostrum pariatur soluta tenetur ullam voluptas voluptatum! Architecto cumque dolorum exercitationem officia ratione!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores cupiditate doloribus dolorum esse id illo iste iusto maxime, minima nemo quaerat, quas repellendus reprehenderit sequi suscipit tenetur vitae voluptatem?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto autem dicta doloremque eaque et facilis hic, incidunt ipsa porro quia quod ratione rerum tenetur unde ut, voluptatibus voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque eos numquam qui quisquam quo sit? Dolorum exercitationem iusto magni obcaecati quo reiciendis sint! Cupiditate dignissimos in ipsum sapiente veniam!

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consequatur, dolore dolores illum ipsum labore nisi nostrum pariatur soluta tenetur ullam voluptas voluptatum! Architecto cumque dolorum exercitationem officia ratione!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores cupiditate doloribus dolorum esse id illo iste iusto maxime, minima nemo quaerat, quas repellendus reprehenderit sequi suscipit tenetur vitae voluptatem?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto autem dicta doloremque eaque et facilis hic, incidunt ipsa porro quia quod ratione rerum tenetur unde ut, voluptatibus voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque eos numquam qui quisquam quo sit? Dolorum exercitationem iusto magni obcaecati quo reiciendis sint! Cupiditate dignissimos in ipsum sapiente veniam!

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consequatur, dolore dolores illum ipsum labore nisi nostrum pariatur soluta tenetur ullam voluptas voluptatum! Architecto cumque dolorum exercitationem officia ratione!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores cupiditate doloribus dolorum esse id illo iste iusto maxime, minima nemo quaerat, quas repellendus reprehenderit sequi suscipit tenetur vitae voluptatem?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto autem dicta doloremque eaque et facilis hic, incidunt ipsa porro quia quod ratione rerum tenetur unde ut, voluptatibus voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque eos numquam qui quisquam quo sit? Dolorum exercitationem iusto magni obcaecati quo reiciendis sint! Cupiditate dignissimos in ipsum sapiente veniam!

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur consequatur, dolore dolores illum ipsum labore nisi nostrum pariatur soluta tenetur ullam voluptas voluptatum! Architecto cumque dolorum exercitationem officia ratione!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci asperiores cupiditate doloribus dolorum esse id illo iste iusto maxime, minima nemo quaerat, quas repellendus reprehenderit sequi suscipit tenetur vitae voluptatem?
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam architecto autem dicta doloremque eaque et facilis hic, incidunt ipsa porro quia quod ratione rerum tenetur unde ut, voluptatibus voluptatum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque eos numquam qui quisquam quo sit? Dolorum exercitationem iusto magni obcaecati quo reiciendis sint! Cupiditate dignissimos in ipsum sapiente veniam!
            </p>
        </div>
    </div>
    {{--@endforeach--}}

