@extends('layout')
@include('admin.menu')
@section('content')
    @foreach($edicao as $dadosEdi)
    @endforeach

    <div class="container" style="margin-top:100px;">
        <h5 class="grey-text text-darken-1">ADD PRÊMIO: {{$dadosEdi->numero}}º EDICÃO</h5>
        <h2 class="grey-text text-darken-1">{{strtoupper($dadosEdi->name)}}</h2>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::open(['route'=>'admin.premio.store','method'=>'post', 'files' => true]) !!}

        @include('admin.edicao.premios._form')

        {!! Form::hidden('user_id', auth()->user()->id )!!}
        {!! Form::hidden('edicao_id', $dadosEdi->id )!!}

        <div class="form-group">
            {!! Form::submit('Cadastrar premio',['class'=>'waves-effect btn blue darken-1 flex-box text-darken-4']) !!}
        </div>

    {!! Form::close() !!}

@stop