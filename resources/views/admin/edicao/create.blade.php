@extends('layout')
@include('admin.menu')
@section('content')




    <div class="container" style="margin-top:50px;">

        <h1>CRIAR NOVA EDIÇÃO:</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        @endif




    {!! Form::open(['route'=>'painel.admin.edicao.store','method'=>'post']) !!}

    @include('admin.edicao._form')


    {!! Form::submit('Finalizar cadastro',['class'=>'waves-effect  btn blue darken-1 flex-box text-darken-4']) !!}


    {!! Form::close() !!}







@stop