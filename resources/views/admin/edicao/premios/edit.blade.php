@extends('layout')
@include('admin.menu')
@section('content')


    <div class="container" style="margin-top:50px;">
    {{--<h1><b>Editar Nº: </b> {{$edicao->numero}}</h1>--}}

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{$erro}}</li>
            @endforeach
        </ul>
    @endif

    {{--Estamos utilizando aqui o form model bind--}}
    {!! Form::model($premio,['route'=>['admin.premio.update', $premio->id],'method'=>'put']) !!}

        @include('admin.edicao.premios._form')

    <div class="form-group">
        {!! Form::submit('Salvar Alterações',['class'=>'btn blue darken-1']) !!}
    </div>
    {!! Form::close() !!}

@stop