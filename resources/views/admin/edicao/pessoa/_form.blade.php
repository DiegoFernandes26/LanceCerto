<div class="row">
    <!--Aqui ficam apenas os campos de formulário para serem extendidos onde precisar-->
    <div class="col s3">
        {!! Form::label('name','Nome:')!!}
        {!! Form::text('name', null) !!}
    </div>

    <div class="col s3">
        {!! Form::label('cpf','Cpf:') !!}
        {!! Form::text('cpf', null) !!}
    </div>

    <div class="col s3">
        {!! Form::label('celular','Celular:') !!}
        {!! Form::tel('celular', null, ['placeholder'=>'xx xxxxx-xxxx']) !!}
    </div>

    <div class="col s3">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email', null, ['placeholder'=>'exemple@exemple.com']) !!}
    </div>
</div>
