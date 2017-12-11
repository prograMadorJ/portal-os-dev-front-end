@extends('layouts.Admin.app')

@section('content')

<div class="container-fluid">
    <p>
        <a href="{{ url('/site-admin/permissoes') }}" class="btn btn-default"><span class="icon icon-key"></span> Todas as permissões</a>
    </p>

    <hr/>

    @include('layouts.Admin._errorForm')

    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Permissão</h5>
        </div>
        <div class="widget-content nopadding">
            {{ Form::model($permissao, ['method' => 'patch', 'url' => '/site-admin/permissoes/'.$permissao->id, 'class' => 'form-horizontal']) }}
                @include('Admin.permissoes._form')
            {{ Form::close() }}
        </div>
    </div>

</div>

@endsection
