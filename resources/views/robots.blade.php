@if (app()->environment() == 'production')
    User-agent: *
    Disallow: /site-admin
    Disallow: /admin
    Disallow: /css
    Disallow: /js
    Disallow: /fonts
    Disallow: /vendor

    Sitemap: https://www.direitodeouvir.com.br/sitemap.xml
@elseif (app()->environment() == 'staging')
    User-agent: *
    Disallow: /

    Sitemap: https://staging.direitodeouvir.com.br/sitemap.xml
@else
    User-agent: *
    Disallow: /

    Sitemap: https://local.sitedo/sitemap.xml
@endif
