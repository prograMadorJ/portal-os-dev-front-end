@extends('layouts.Admin.app')

@section('content')

<div class="container-fluid">
    <p>
        <a href="{{ url('/site-admin/tipo_media') }}" class="btn btn-default"><span class="icon icon-group"></span> Todos os Tipo Media</a>
    </p>

    <hr />

    @include('layouts.Admin._errorForm')

    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Tipo Media</h5>
        </div>
        <div class="widget-content nopadding">
            {{ Form::open(['method' => 'post', 'url' => '/site-admin/tipo_media', 'class' => 'form-horizontal']) }}
                @include('Admin.tipo_media._form')
            {{ Form::close() }}
        </div>
    </div>

</div>

@endsection
