@extends('layout')
@include('admin.menu')
@section('content')

    <div class="container" style="margin-top:50px;">
        <h5><b>Editar Edição Nº: </b> {{$edicao->numero}}</h5>
        <h2>{{$edicao->name}}</h2>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        @endif
        {{-- EDIT/DELET(INICIO) - Mostra todos os premios cadastrados para esta edição, dando as opções de deletar ou editar--}}
        {{--Estamos utilizando aqui o form model bind--}}
        {!! Form::model($edicao,['route'=>['painel.admin.edicao.update', $edicao->id],'method'=>'put']) !!}

        @include('admin.edicao._form')
        {{--{!! dd($edicao->premio) !!}--}}
            <div class="row">
                <div class="col s12">
                    @foreach($edicao->premio as $premios)
                        <div class="col s3">
                            <div class="card grey lighten-4">
                                <div class="card-image valign-wrapper">
                                    <img src="/{{$premios->img_caminho}}">
                                    <span class="card-title">{{$premios->name}}</span>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="col s6">
                                                <a href="{{route('admin.premio.edit', ['id'=>$premios->id])}}"
                                                   class="waves-effect waves-light btn box-shadow-0 __cem flex-box"><i
                                                            class="material-icons fle">edit</i></a>
                                            </div>

                                            <div class="col s6">
                                                <a href="{{route('admin.premio.destroy', ['id'=>$premios->id])}}"
                                                   class="waves-effect waves-light btn box-shadow-0 __cem flex-box"><i
                                                            class="material-icons">delete</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>

        {{--EDIT/DELET(FIM)--}}

        <div class="form-group">
            {!! Form::submit('Salvar Alterações',['class'=>'waves-effect waves-light btn-large btn-large  __cem fle-box']) !!}
        </div>



    {!! Form::close() !!}

@stop