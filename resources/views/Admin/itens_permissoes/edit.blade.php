@extends('layouts.Admin.app')

@section('content')

<div class="container-fluid">
    <p>
        <a href="{{ url('/site-admin/itens_permissoes') }}" class="btn btn-default"><span class="icon icon-reorder"></span> Todos os itens de permissões</a>
    </p>

    <hr/>

    @include('layouts.Admin._errorForm')

    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Item Permissão</h5>
        </div>
        <div class="widget-content nopadding">
            {{ Form::model($itemPermissao, ['method' => 'patch', 'url' => '/site-admin/itens_permissoes/'.$itemPermissao->id, 'class' => 'form-horizontal']) }}
                @include('Admin.itens_permissoes._form')
            {{ Form::close() }}
        </div>
    </div>

</div>

@endsection
