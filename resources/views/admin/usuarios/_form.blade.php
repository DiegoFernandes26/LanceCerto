<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row">
    <div class="col s4">
        {!!Form::label('name', 'Nome', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col s4">
        {!!Form::label('email', 'Email', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col s4">
        {!!Form::label('celular', 'Celular', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('celular',null,['class'=>'form-control']) !!}
        </div>
    </div>


</div>

<div class="row">

    <div class="col s3">
        {!!Form::label('cpf', 'Cpf', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('cpf',null,['class'=>'form-control']) !!}
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
            {!! Form::select('tipo',['2'=>'Consultor','1' => 'Admin'],null,
                ['placeholder'=>'Nível', (Auth()->user()->tipo != 1 ? 'disabled':'')])
             !!}
        </div>
    </div>
</div>