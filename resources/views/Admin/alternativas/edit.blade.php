@extends('layouts.Admin.app')

@section('content')

    <div class="container-fluid">
        <p>
            <a href="{{ url('/site-admin/alternativas') }}" class="btn btn-default"><span class="icon icon-ok-sign"></span> Todas as Alternativas</a>
        </p>

        <hr/>

        @include('layouts.Admin._errorForm')

        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Alternativa</h5>
            </div>
            <div class="widget-content nopadding">
                {{ Form::model($alternativa, ['method' => 'patch', 'url' => '/site-admin/alternativas/'.$alternativa->id, 'class' => 'form-horizontal']) }}
                    @include('Admin.alternativas._form')
                {{ Form::close() }}
            </div>
        </div>

    </div>

@endsection
