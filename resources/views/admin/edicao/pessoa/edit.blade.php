@extends('layout')
@section('content')

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{$erro}}</li>
            @endforeach
        </ul>
    @endif


    {{--Estamos utilizando aqui o form model bind--}}
    {!! Form::model((!empty($pessoa) ? $pessoa: $pessoa = null),
    ['route'=>['painel.admin.edicao.update', (!empty($pessoa) ? $pessoa->id : $pessoa = null)],'method'=>'put']) !!}

        @include('admin.edicao.pessoa._form')

    <div class="form-group">
        {!! Form::submit('Salvar Alterações',['class'=>'']) !!}
    </div>

    <br><br>

    {!! Form::close() !!}

