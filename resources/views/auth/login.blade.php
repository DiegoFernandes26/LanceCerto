@extends('layout')
@section('content')

    <div class="container-home">
        <div class="login-home z-depth-1">

        <!-- <div class="panel-heading">{{ trans('validation.attributes.login') }}</div> -->

            @if (count($errors) > 0)
                <div class="alert alert-danger deep-orange accent-2">
                    <h3>Ooops! :( </h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="form-login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>                   
                    <div class="col-md-6">
                        {!! Form::label('email', 'Email', ['class'=>'col-md-4 control-label'])!!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'type' => 'email']) !!}
                    </div>
                </div>

                <div>
                    <div class="col-md-6">
                        {!! Form::label('password', 'Senha', ['class'=>'col-md-4 control-label'])!!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div style="text-align: center">
                    {!! Form::submit('Login', ['class'=>'waves-effect waves-light btn total green accent-4'], ['style'=>'margin-right: 15px']) !!}<br/><br/>
                    <a href="{{route('password/email')}}">Esqueci minha senha :/</a>
                </div>

            </form>

            <div class="faixa"></div>
        </div>
    </div>
@endsection