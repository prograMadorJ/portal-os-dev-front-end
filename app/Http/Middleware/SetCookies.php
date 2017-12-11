<?php

namespace App\Http\Middleware;

use Closure;

use App\Library\TrackCookie;

class SetCookies
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next)
  {
    $track = new TrackCookie();

    if (isset($_GET['indicador_campanha'])) {
      setcookie('indicador_campanha', $_GET['indicador_campanha'], time()+60*60*24*5);
    }
    if (isset($_SERVER['HTTP_REFERER']) && !isset($_COOKIE['http_referer'])) {
      setcookie('http_referer', $_SERVER['HTTP_REFERER'], time()+60*60*2);
    }

    return $next($request);
  }
}
