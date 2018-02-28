<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function pagina404() {
        return view('Portal_OS.pages.error404');
    }
}
