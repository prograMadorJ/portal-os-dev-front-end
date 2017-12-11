@extends('layouts.Admin.app')

@section('content')

    <div class="container-fluid">
        <p>
            <a href="{{ url('/site-admin/perguntas') }}" class="btn btn-default"><span class="icon icon-group"></span> Todas as Perguntas</a>
        </p>

        <hr/>

        @include('layouts.Admin._errorForm')

        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Pergunta</h5>
            </div>
            <div class="widget-content nopadding">
                {{ Form::model($pergunta, ['method' => 'patch', 'url' => '/site-admin/perguntas/'.$pergunta->id, 'class' => 'form-horizontal', 'files' => 'true']) }}
                    @include('Admin.perguntas._form')
                {{ Form::close() }}
            </div>
        </div>

    </div>

@endsection
