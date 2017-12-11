<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Artigo;

class AdminController extends Controller
{

	public function __construct() {
		return $this->middleware('auth');
	}

	public function index() {
		if (\Auth::user()->pode('Artigo', 'index')) {
			$artigos_publicados = Artigo::where('status', '=', '1')->get();
			$artigos = Artigo::all();
		} else {
			$artigos_publicados = null;
			$artigos = null;
		}
		return View("Admin.home", compact('artigos_publicados', 'artigos'));
	}

}
