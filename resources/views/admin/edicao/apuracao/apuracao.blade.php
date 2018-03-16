@extends('layout')
@include('admin.menu')
@section('content')

    {{--modal cadastro de card--}}

    {{--inicio formulário de cadastro de lances--}}

    {{--container conteudo--}}
    <div class="container" style="width: 960px !important; margin-top:100px;">

        <div class="row">
            <div class="col s12 topo-card">
                <div class="col s6 dados-edicao grey-text text-darken-3">
                    <h2 style="text-align:left">{{$ultEdicao->numero}}ª Edição</h2>
                    <p style="text-align:left">{{$ultEdicao->name}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        {{--mostra mensagem de erro--}}
        @if (session('status'))
            <div class="alert success">
                {{ session('status') }}
            </div>
        @endif

        @foreach($ultEdicao->premio as $premios)

            {!! Form::open(['route'=>'home.apuracao.check','method'=>'post']) !!}
            <div class="row">
                <div class="col s3">
                    <div class="col s12">
                        <div class="card grey lighten-4">
                            <div class="card-image valign-wrapper">
                                <img src="{{asset($premios->img_caminho)}}">
                                <span class="card-title">{{$premios->marca}} {{$premios->modelo}}</span>
                            </div>
                            <div class="card-content">
                                {{--<label>Valor do lance</label>--}}
                                {{--{!! Form::text('Lances', null,['class' => 'dinheiro input-lance green accent-4', 'placeholder'=>'Lances', 'required disabled' ]) !!}--}}
                                {!! Form::hidden('premio_id', $premios->id) !!}
                                {{--{!! Form::submit('Iniciar apuraração',  ['class'=>'__cem btn grey lighten-2 grey-text text-darken-1 flex-box box-shadow-0']) !!}--}}
                                @if(in_array($premios->id, $idpremio))
                                    <button class="__cem btn grey lighten-2 grey-text text-darken-1 flex-box box-shadow-0 disabled">
                                        <i class="material-icons">lock</i>Apuração
                                    </button>

                                @else
                                    <button class="__cem btn light-blue darken-1 text-darken-1 flex-box box-shadow-0">
                                        Realizar Apuração
                                    </button>
                                @endif
                            </div>
                            <div class="card-action">
                                @if(in_array($premios->id, $idpremio))
                                    <div class="center-align red-text text-darken-1 aviso-1">Apuração já realizada
                                    </div>
                                @else
                                    <div class="aviso-1">&nbsp;</div>
                                @endif

                            </div>
                        </div>
                        {{--                    {!! Form::submit('Apurar',  ['class'=>'btn grey lighten-2 grey-text text-darken-1 flex-box box-shadow-0']) !!}--}}
                        {!! Form::hidden('user_id', auth()->user()->id )!!}
                        {{--{!! Form::hidden('pessoa_id', (!empty($pessoa) ? $pessoa->id : $pessoa = null) )!!}--}}
                        {!! Form::hidden('edicao_id', $ultEdicao->id )!!}

                        {!! Form::close() !!}
                        {{--fim formulário cadastro de lances--}}
                    </div>
                </div>

                @endforeach

            </div>

    </div>
@stop