@extends('layout')
@include('admin.menu')
@section('content')
    <div class="container" style="margin-top: 100px;">

        {{--compradores head--}}
        <div class="col s6 dados-edicao grey-text text-darken-3">
            <h2 style="text-align:left">Acertadores</h2>
            <p style="text-align:left">{{$ultEdicao->numero}}º Edição - {{$ultEdicao->name}}</p>
        </div>

        @foreach ($ultEdicao->premio as $premios)
            <div class="card">

                @foreach($ganhador as $sortudo)
                    @if($premios->id == $sortudo->premio_id)
                        <div class="row">
                            <div class="col s12">
                                <div class="col s16">
                                    <div class="card-content">
                                        <h4>Premio: {{$premios->marca}}{{$premios->modelo}}</h4>
                                        <div class="card-image waves-effect waves-block waves-light">
                                            <img class="circle" src="{{asset($premios->img_caminho)}}">
                                        </div>
                                        <p>Nome: {{$sortudo->name}}</p>
                                        {{--<p>Card Nº: {{$sortudo->num_card}}</p>--}}
                                        {{----}}
                                    </div>
                                </div>
                                <div class="col s4 right result-valor grey lighten-4">
                                    <h1 class="green-text text-accent-4">{{$sortudo->lance}}</h1>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach

    </div>

    <script>

    </script>