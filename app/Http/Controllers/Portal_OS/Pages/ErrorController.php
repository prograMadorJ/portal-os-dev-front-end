<?php

namespace App\Http\Controllers\Portal_OS\Pages;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function pagina404() {
        return view('Portal_OS.pages.error404');
    }
}
