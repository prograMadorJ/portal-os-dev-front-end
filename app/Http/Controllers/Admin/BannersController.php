<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Banner;
use App\Local;
use App\Media;
use App\MediaDerivative;

class BannersController extends Controller
{

  public function __construct() {
      $this->middleware("auth");
  }

  public function index() {
      if (!\Auth::user()->pode('Banner', 'index')) return redirect('/');

      $banners = Banner::orderBy('id', 'desc')->paginate(10);
      return View('Admin.banners.index', compact('banners'));
  }

  public function show($id) {
      if (!\Auth::user()->pode('Banner', 'show')) return redirect('/');

      $banner = Banner::find($id);
      if ($banner) {
          $banner->recuperar_url();
          return View('Admin.banners.show', compact('banner'));
      } else {
          return redirect(action('Admin\BannersController@index'));
      }
  }

  public function create() {
      if (!\Auth::user()->pode('Banner', 'create')) return redirect('/');

      $local = Local::where('status', '=', '1')->get()->pluck('descricao', 'id');
      $banner = null;
      $media = Media::whereNotIn('id', MediaDerivative::select('media_id')->get())
          ->where('tipo_media_id', 1)
          ->orderBy('id', 'desc')->get();
      return View('Admin.banners.create', compact('local', 'banner', 'media'));
  }

  public function store(Request $request) {
      if (!\Auth::user()->pode('Banner', 'create')) return redirect('/');

      $this->validate($request, Banner::rules());
      $data = $request->all();
      $banner = Banner::create($data);
      return redirect(action('Admin\BannersController@show', $banner->id));
  }

  public function edit($id) {
      if (!\Auth::user()->pode('Banner', 'edit')) return redirect('/');

      $banner = Banner::find($id);
      if ($banner) {
          $local = Local::where('status', '=', '1')->get()->pluck('descricao', 'id');
          $media = Media::whereNotIn('id', MediaDerivative::select('media_id')->get())
              ->where('tipo_media_id', 1)
              ->orderBy('id', 'desc')->get();
          return View('Admin.banners.edit', compact('banner', 'local', 'media'));
      } else {
          return redirect(action('Admin\BannersController@create'));
      }
  }

  public function update(Request $request, $id) {
      if (!\Auth::user()->pode('Banner', 'edit')) return redirect('/');

      $data = $request->all();
      $banner = Banner::find($id);
      $data['periodo_inicio'] = isset($data['periodo_inicio']) ? $data['periodo_inicio'] : $banner->periodo_inicio;
      $data['periodo_final'] = isset($data['periodo_final']) ? $data['periodo_final'] : $banner->periodo_final;
      $banner->fill($data)->save();
      return redirect(action('Admin\BannersController@show', $banner->id));
  }

  public function destroy($id) {
      if (!\Auth::user()->pode('Banner', 'destroy')) return redirect('/');

      $banner = Banner::find($id);
      if ($banner) {
          $banner->delete();
      }
      return redirect(action('Admin\BannersController@index'));
  }

}
