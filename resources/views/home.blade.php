@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>
                    <div class="panel-body">
                        <a href="{{route('painel.admin.edicao')}}" class="btn btn-default">Edicoes</a>
                        <p>Seja bem vindo ao Lance Certo!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection