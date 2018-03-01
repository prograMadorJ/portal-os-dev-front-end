<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function pagina404() {
        return view('Portal_OS.pages.error404');
    }
}
