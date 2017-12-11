@extends('layouts.Admin.app')

@section('content')

    <div class="container-fluid">
        <p>
            <a href="{{ url('/site-admin/questoes') }}" class="btn btn-default"><span class="icon icon-question-sign"></span> Todos as Perguntas Frequentes</a>
        </p>

        <hr/>

        @include('layouts.Admin._errorForm')

        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Grupo</h5>
            </div>
            <div class="widget-content nopadding">
                {{ Form::model($questao, ['method' => 'patch', 'url' => '/site-admin/questoes/'.$questao->id, 'class' => 'form-horizontal']) }}
                    @include('Admin.questoes._form')
                {{ Form::close() }}
            </div>
        </div>

    </div>

@endsection
