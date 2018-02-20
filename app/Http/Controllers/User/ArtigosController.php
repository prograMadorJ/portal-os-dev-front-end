<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Helpers\ControllerHelper;

use App\Artigo;
use App\Categoria;
use App\Seo;
use App\Media;
use App\MediaDerivative;

class ArtigosController extends Controller
{
    public function index() {
    	$posts = Artigo::where('status', 1)->limit(6)->orderBy('publicacao', 'desc')->get();
    	dd($posts);
    	return view('layouts.app',
    		compact(
    			'posts'
    		)
    	);
    }
}
