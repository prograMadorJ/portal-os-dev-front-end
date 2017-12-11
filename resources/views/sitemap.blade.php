<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

   	<url>
    	<loc>{{ config('app.url') }}</loc>
    	<lastmod>{{ date('Y-m-d') }}</lastmod>
    	<changefreq>daily</changefreq>
    	<priority>1.0</priority>
   	</url>

    {{-- Blog --}}
    <url>
        <loc>{{ url('/blog') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

   	@foreach ($categorias as $categoria)
		<url>
	    	<loc>{{ url('/blog/'.$categoria->url) }}</loc>
	    	<lastmod>{{ date('Y-m-d', strtotime($categoria->updated_at)) }}</lastmod>
	    	<changefreq>weekly</changefreq>
	    	<priority>0.8</priority>
	   	</url>
   	@endforeach

   	@foreach ($artigos as $artigo)
		<url>
	    	<loc>{{ url('/blog/'.$artigo->url) }}</loc>
	    	<lastmod>{{ date('Y-m-d', strtotime($artigo->updated_at)) }}</lastmod>
	    	<changefreq>weekly</changefreq>
	    	<priority>0.6</priority>
	   	</url>
   	@endforeach

    {{-- Produtos --}}
    <url>
        <loc>{{ url('/aparelhos-auditivos') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    @foreach ($produtos as $produto)
		<url>
	    	<loc>{{ url('/aparelhos-auditivos/'.$produto->url) }}</loc>
	    	<lastmod>{{ date('Y-m-d', strtotime($produto->updated_at)) }}</lastmod>
	    	<changefreq>weekly</changefreq>
	    	<priority>0.6</priority>
	   	</url>
   	@endforeach

    {{-- Clínicas  --}}
    <url>
        <loc>{{ url('/clinicas') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/perguntas-frequentes') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/audiometria') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/teste-gratis') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/credenciamento') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/como-comprar-aparelho-auditivo') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/quem-somos') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/agende-sua-consulta') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/depoimentos') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/teste-auditivo') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

    <url>
        <loc>{{ url('/contato') }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>

</urlset>
