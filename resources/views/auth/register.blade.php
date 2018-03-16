@extends('layout')
@include('admin.menu')
@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Ooops! </strong>Parece que há algo errado :/<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h2 class="grey-text">NOVO USUÁRIO</h2>

                        {!! Form::open(['route'=>'register.user','method'=>'post']) !!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="row">
                                <div class="col s4">
                                   {!!Form::label('name', 'Nome', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col s4">
                                    {!!Form::label('email', 'Email', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email"
                                               value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col s4">
                                    {!!Form::label('celular', 'Celular', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="celular"
                                               value="{{ old('celular') }}">
                                    </div>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col s3">
                                    {!!Form::label('cpf', 'Cpf', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="cpf" value="{{ old('cpf') }}">
                                    </div>
                                </div>

                                <div class="col s3">
                                    {!!Form::label('password', 'Senha', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="col s3">
                                    {!!Form::label('password', 'Confirmar Senha', ['class'=>'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col s3">
                                    <div class="col-md-6">
                                        {!! Form::label('tipo', 'Nível de Usuário') !!}
                                        {!! Form::select('tipo', ['2'=>'Consultor','1' => 'Admin'], null) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit"
                                            class="waves-effect waves-light btn blue darken-1 text-darken-1 box-shadow-0 btn-large">
                                        Cadastrar usuário{{-- {{ trans('validation.attributes.register') }}--}}
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection