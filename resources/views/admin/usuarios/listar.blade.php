@extends('layout')
@include('admin.menu')
@section('content')


    <div class="container" style="margin-top: 100px">
        @if (session('status'))
            <div class="alert success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <a href="{{route('register')}}"
               class="waves-effect waves-light btn btn-large light-blue darken-1 text-darken-1 flex-box box-shadow-0"><i
                        class="material-icons">add_circle</i> ADD USUÁRIO
            </a>


            {{--consultores--}}
            <ul class="collection with-header">
                @foreach($users as $usuario)

                    <li class="collection-item avatar lista-item  grey lighten-5">

                        <div class="dados-edicao-home">
                           <h5>{{$usuario->name}}</h5>
                            <p class="blue-text">({{$usuario->tipo == 1? 'Administrador':'Consultor'}})</p>
                        </div>
                        <div class="bt-edicao">
                            <div>
                                <a href="{{route('userEdit',$usuario->id)}}" class="waves-effect waves-light btn grey lighten-2 blue-text text-darken-1 box-shadow-0">Editar</a>
                            </div>
                            <div>
                                <a href="#" class="waves-effect waves-light btn red darken-1  text-darken-1 box-shadow-0">Excluir</a>
                            </div>

                        </div>
                    </li>
                @endforeach
            </ul>
            {{--consultores--}}

        </div>
    </div>








@endsection