@extends('layout')
@include('admin.menu')
@section('content')



    <div class="container" style="margin-top:100px;">
        {{--<h5 class="grey-text text-darken-3">Home >> Ediçoes:</h5>--}}
        <a href="{{route('painel.admin.edicao.create')}}"
           class="waves-effect waves-light btn btn-large light-blue darken-1 text-darken-1 flex-box box-shadow-0"><i
                    class="material-icons">add_circle</i> Criar nova edição
        </a>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <br><br>

        <ul class="collection">

            @foreach($edi as $edicao)
                <li class="collection-item avatar lista-item  grey lighten-5">
                    <div class="col s2 edicao_num  grey-text text-darken-1">
                        <h1 class="n-edicao"> {{$edicao->numero}} </h1>
                    </div>
                    <div class="dados-edicao-home">
                        @if($edicao->dt_apuracao < \Carbon\Carbon::now())
                            <h5 class="grey-text text-darken-1 truncate"><strong>{{$edicao->name}}</strong></h5>
                            <p class="red-text text-darken-1">{{date('d/m/Y' ,strtotime($edicao->dt_apuracao))}} :(</p>

                        @else
                            <h5 class="grey-text text-darken-2 truncate"><strong>{{$edicao->name}}</strong></h5>
                            <p class="grey-text text-darken-2">{{date('d/m/Y' ,strtotime($edicao->dt_apuracao))}} </p>
                        @endif
                    </div>


                    @if($edicao->apurado == true )
                        <a class="btn waves-effect waves-light blue darken-2">Apurado</a>

                    @elseif($edicao->dt_apuracao < \Carbon\Carbon::now())

                        <div>
                            <a href="{{route('painel.admin.edicao.edit', ['id'=>$edicao->id])}}"
                               class="waves-effect waves-light btn grey lighten-2 red-text text-darken-1 box-shadow-0">Editar</a>
                        </div>
                    @else
                        <div class="bt-edicao">
                            <div>
                                <a href="{{route('admin.premio.create', ['id'=>$edicao->id])}}"
                                   class="waves-effect waves-light btn grey lighten-2 blue-text text-darken-1 box-shadow-0">Add
                                    Prêmio
                                    prêmio</a>
                            </div>
                            <div>
                                <a href="{{route('painel.admin.edicao.edit', ['id'=>$edicao->id])}}"
                                   class="waves-effect waves-light btn grey lighten-2 grey-text text-darken-1 box-shadow-0">Editar</a>
                            </div>
                            <div>
                                <a href="{{route('painel.admin.edicao.destroy', ['id'=>$edicao->id])}}"
                                   class="waves-effect waves-light btn red darken-1 text-darken-1 box-shadow-0">Deletar</a>
                            </div>
                        </div>
                    @endif
                </li>

            @endforeach
        </ul>


        @if(count($edi) <= 0)

            <h5 class="center-align grey-text text-darken-2">
                Não existem edições cadastradas até o momento.
            </h5>
        @endif


    </div>
    {{--fim do container--}}

@stop