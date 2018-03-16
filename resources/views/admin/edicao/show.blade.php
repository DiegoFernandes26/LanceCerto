@extends('layout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">

            <h2>Edição Nº {{$edicao->numero}}</h2>
            <table class="table">
                <tr>
                    <th>Numero</th>
                    <th>Nome</th>
                    <th>Data de verificação</th>
                </tr>
                <tr>
                    <td>{{$edicao->numero}}</td>
                    <td>{{$edicao->name}}</td>
                    <td>{{$edicao->dt_apuracao}}</td>

                </tr>
            </table>
            <a href="{{route('admin.premio.new', ['id'=>$edicao->id])}}" class="btn btn-success">Add prêmios</a>
        </div>

    </div>

    @if($premios)

        <br>
        <hr>
        <h3>Pessoa:</h3>

        {{--@if($errors->any())--}}
        {{--<ul class="alert">--}}
        {{--@foreach($errors->all() as $erro)--}}
        {{--<li>{{$erro}}</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--@endif--}}

        {{--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||--}}

        {{--campo de busca por usuário através de cpf ou rg--}}
        {!! Form::open(['route'=>'edicao.pessoa.search','method'=>'post', 'id'=>'testeform']) !!}

        <div class="form-group">
            {!! Form::text('busca', null,['class'=>'form-control', 'placeholder'=>'CPF ou RG']) !!}
        </div>
        {!!  Form::hidden('id', $edicao->id)!!}

        <div class="form-group">
            {!! Form::submit('Buscar',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    @else
        <a href="{{route('admin.premio.new', ['id'=>$edicao->id])}}" class="btn btn-success">Add prêmios</a>
    @endif

    {{--|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||--}}

    {{--FORMULARIO DE CADASTRO DE PESSOAS--}}
    {{--ao ser realizada a consulta é retornada a variável $result e então se nao tiver vazia vai para cadastro de lance, do contrário vai para cadastro de pessoas--}}
    @if(isset($result))
        @if(!empty($result))

            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar lance para: <b>{{$result->name}}</b></div>
                <div class="panel-body">
                    @include('admin.edicao.lance.create')
                </div>
            </div>
        @endif
    @endif

    @if(isset($result))
        @if($result == false)
            @include('admin.edicao.pessoa.create')
        @endif
    @endif
@stop