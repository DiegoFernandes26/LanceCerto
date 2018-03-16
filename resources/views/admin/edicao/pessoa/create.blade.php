@extends('layout')
@include('admin.menu')
@section('content')

    <div class="container" style="margin-top: 100px;">
        <p>Cadastre o usuário para processeguir com seu <strong>Lance Certo</strong></p><br>
        {{--FORMULÁRIO DE INCLUSÃO DE PESSOAS(quem compra os cards) NO BANCO--}}
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route'=>'edicao.pessoa.store','method'=>'post']) !!}

        @include('admin.edicao.pessoa._form')

        {!! Form::hidden('user_id', auth()->user()->id )!!}

        <div class="form-group">
           {!! Form::submit('Prosseguir',['class'=>'btn blue lighten-2 text-darken-1 flex-box box-shadow-0  btn-large']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
