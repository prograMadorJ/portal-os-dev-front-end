@extends('layouts.Admin.app')

@section('content')

<div class="container-fluid">
    <p>
        <a href="{{ url('/site-admin/grupos_itens_permissoes') }}" class="btn btn-default"><span class="icon icon-key"></span><span class="icon icon-group"></span> Todos os Grupos e permissões</a>
    </p>

    <hr/>

    @include('layouts.Admin._errorForm')

    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Permissão do Grupo</h5>
        </div>
        <div class="widget-content nopadding">
            {{ Form::open(['method' => 'post', 'url' => '/site-admin/grupos_itens_permissoes', 'class' => 'form-horizontal']) }}
                @include('Admin.grupos_itens_permissoes._form')
            {{ Form::close() }}
        </div>
    </div>

</div>

@endsection
