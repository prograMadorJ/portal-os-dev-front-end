<?php

namespace App\Http\Middleware;

use Closure;
use View;
use App\Script;

class LoadScripts
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
    $scripts = Script::where('status', 1)->get();
    View::share('scripts', $scripts);
    return $next($request);
  }
}
