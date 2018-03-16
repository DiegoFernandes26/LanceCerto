@extends('layout')
@include('admin.menu')
@section('content')


    <div class="container" style="margin-top:50px;">
        <h5 class="grey-text"><b>Editar Perfil </h5>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        @endif
        {{-- EDIT/DELET(INICIO) - Mostra todos os premios cadastrados para esta edição, dando as opções de deletar ou editar--}}
        {{--Estamos utilizando aqui o form model bind--}}
        {!! Form::model($user,['route'=>['userUpdate', $user->id],'method'=>'put']) !!}

        @include('admin.usuarios._form')

        <div class="form-group">
            {!! Form::submit('Salvar Alterações',['class'=>'btn-large btn-large  __cem fle-box blue darken-1 flex-box text-darken-4']) !!}
        </div>



    {!! Form::close() !!}

@stop