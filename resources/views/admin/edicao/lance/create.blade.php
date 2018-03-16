@extends('layout')
@include('admin.menu')
@section('content')
    form de criação de lances
    {!! Form::model($result, ['route'=>'edicao.lances.store','method'=>'post']) !!}

    @include('admin.edicao.lance._form')
    {!! Form::hidden('user_id', auth()->user()->id )!!}
    {!! Form::hidden('pessoa_id', $result->id )!!}
    {!! Form::hidden('edicao_id', $edicao->id )!!}

    <div class="form-group pull-right">
        {!! Form::submit('Envia lance',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@stop