<div class="row">
    <div class="col s12">
        <div class="col s3">
            <div>
                {!! Form::label('Numero','Numero:')!!}
                {!! Form::text('numero', (isset($numeroEd) ? $numeroEd: $edicao->numero), [ 'disabled']) !!}
                {!! Form::hidden('numero', (isset($numeroEd) ? $numeroEd: $edicao->numero), ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="col s3">
            <div>
                {!! Form::label('name','Nome da Edicao:')!!}
                {!! Form::text('name', null,['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="col s3">
            <div >
                {!! Form::label('tiragem_min','Tiragem Minima:')!!}
                {!! Form::text('tiragem_min', $tmin, ['disabled']) !!}
                {!! Form::hidden('tiragem_min', $tmin) !!}
            </div>
        </div>

        <div class="col s3">
            <div>
                {!! Form::label('tiragem_max','Tiragem Máxima:')!!}
                {!! Form::text('tiragem_max', null,['class'=>'form-control ']) !!}
            </div>
        </div>

        <div class="col s4">
            <div>
                {!! Form::label('valor_card','Valor do Card R$:')!!}
                {!! Form::text('valor_card', null,['class'=>'dinheiro']) !!}
            </div>
        </div>

        <div class="col s4">
            <div>
                {!! Form::label('valor_comissao','Valor da Comissão R$:')!!}
                {!! Form::text('valor_comissao', null,['class'=>'dinheiro']) !!}
            </div>
        </div>

        <div class="col s4">
            <div>
                {!! Form::label('data','Data do apuração:') !!}
                {!! Form::date('dt_apuracao', null, ['class'=>'datepicker']) !!}
            </div>
        </div>

        {!! Form::hidden('user_id', auth()->user()->id )!!}
    </div>
</div>