<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Portal_OS\User\ArtigosController;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        return view('Portal_OS.pages.blog',ArtigosController::posts());
    }

    public function post() {

    }

    public function categories() {

    }

    public function loadMore() {

    }
}
