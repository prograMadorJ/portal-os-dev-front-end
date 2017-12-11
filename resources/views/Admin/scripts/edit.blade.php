@extends('layouts.Admin.app')

@section('content')

  <div class="container-fluid">
    <p>
      <a href="{{ url('/site-admin/scripts') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os scripts</a>
    </p>

    <hr/>

    @include('layouts.Admin._errorForm')

    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Script</h5>
      </div>
      <div class="widget-content nopadding">
        {{ Form::model($script, ['method' => 'patch', 'url' => '/site-admin/scripts/'.$script->id, 'class' => 'form-horizontal']) }}
          @include('Admin.scripts._form')
        {{ Form::close() }}
      </div>
    </div>

  </div>

@endsection
