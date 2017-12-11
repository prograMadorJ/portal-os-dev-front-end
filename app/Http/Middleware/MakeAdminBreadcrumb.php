<?php

namespace App\Http\Middleware;

use Closure;
use View;

class MakeAdminBreadcrumb {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $name_controller = str_replace('Controller', '', class_basename(\Route::current()->getController()));
        $name_method = substr(\Route::current()->getActionName(), strrpos(\Route::current()->getActionName(), '@') + 1 );
        if ($name_method == 'index') {
            $breadcrumbs[] = [
                'name' => $name_controller,
                'url' => $_SERVER['REQUEST_URI'],
                'icon' => '',
            ];
        } else {
            $breadcrumbs[] = [
                'name' => $name_controller,
                'url' => '/site-admin/'.strtolower($name_controller),
                'icon' => '',
            ];
            $breadcrumbs[] = [
                'name' => $name_method,
                'url' => $_SERVER['REQUEST_URI'],
                'icon' => '',
            ];
        }
        View::share('breadcrumbs', $breadcrumbs);
        return $next($request);
    }
}
