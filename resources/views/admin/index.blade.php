@extends('layout')
@include('admin.menu')
@section('content')
    @if (session('status'))
        <div class="alert success">
            {{ session('status') }}
        </div>
    @endif
    {{--se não existir edição aparece um botão para criar a primeira--}}
    @if($ultEdicao == false || $ultEdicao->dt_apuracao < \Carbon\Carbon::now() || $ultEdicao->apurado == true)
        <div class="container box-content">
            <div class="collapsible box-content">

                @if(Auth()->user()->tipo == 1)
                    <h4 class="blue-text">Cadastre uma nova Edição :)</h4>
                    <div style="width: 100%;"><p class="red-text">Nenhuma Edição ativa!</p></div>
                    <div>
                        <a href="{{route('painel.admin.edicao.create')}}">
                            <button class="waves-effect waves-light btn-large  red darken-3"><i
                                        class="material-icons left">add_circle</i>
                                Cadastrar nova edição
                            </button>
                        </a>
                    </div>
                @else
                    {{--Caso quem esteja vendo essa tela não seja um usuário admin--}}
                    <h4 class="blue-text">Consultor, aguarde o cadastro de uma nova Edição :)</h4>
                    <div style="width: 100%;"><p class="red-text">Nenhuma Edição ativa!</p></div>
                @endif
            </div>
        </div>
    @else
        @if(count($premio)< 1 || $premio == false)
            <div class="container box-content">
                <div class="collapsible box-content">
                    <h4 class="blue-text">Edição {{$ultEdicao->name}}</h4>
                    @if(Auth()->user()->tipo == 1)
                    <div style="width: 100%;"><p class="red-text">Ainda não há prêmios cadastrados :(</p></div>
                    <div>
                        <a href="{{route('admin.premio.create', ['id'=>$ultEdicao->id])}}">
                            <button class="waves-effect waves-light btn-large indigo darken-1"><i
                                        class="material-icons left">card_giftcard</i>
                                Cadastrar Premio \o/
                            </button>
                        </a>
                    </div>
                        @else
                        <div style="width: 100%;"><p class="red-text">Consultor, ainda não há prêmios cadastrados para a Edição atual :(</p></div>
                    @endif
                </div>
            </div>

        @else
            {{--INICIO | será realizada uma busca por pessoa, que será retornada na variavel $pessoa, se retornar algum valor
             será carregado o formulario para cadastrar lances--}}
            @if(isset($pessoa))
                <div class="container box-content__">
                    {{--carrega--}}
                    @include('admin.edicao.lance.conteiner')

                    @else
                        <div class="container box-content">
                            <div class="collapsible box-content">
                                <div class="">
                                    <h4 class="blue-text">Edição {{$ultEdicao->name}}</h4>
                                </div>
                                <div style="width: 100%;"><p class="gray-text">Busque uma pessoa para cadastrar os
                                        lances</p></div>
                                <div class="row">
                                    {!! Form::open(['route'=>'edicao.pessoa.search','method'=>'get', 'class'=>'campo_busca_cpf']) !!}
                                    {!! Form::text('busca', null,['placeholder'=>'Rg, Celular ou Email', 'class'=>'grey lighten-3 input-busca', 'autofocus' ]) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                    {{--<a id="menu"--}}
                    {{--class="waves-effect waves-light btn btn-floating btn-large menu-lateral green accent-4">--}}
                    {{--<i class="material-icons">add</i>--}}
                    {{--</a>--}}
                    <!-- Tap Target Structure -->
                        <div class="tap-target grey lighten-3" data-activates="menu">
                            <div class="tap-target-content">
                                <h5>ADICIONAR CARD<span class="badge">CTRL+f2</span></h5>
                                <p>Aqui você poderá cadastrar um novo CARD, em uma edição vigente</p>
                            </div>
                        </div>


                </div>
            @endif
        @endif
    @endif

@stop