<?php

namespace App\Http\Controllers;

use App\Depoimento;
use App\Http\Controllers\Portal_OS\User\DepoimentoController;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Portal_OS.pages.stories',DepoimentoController::getDepoimentos());
    }
}
