<!--Aqui ficam apenas os campos de formulário para serem extendidos onde precisar-->
<div class="row">
    <div class="col s4">
        {!! Form::label('name','Nome:')!!}
        {!! Form::text('name', null,['class'=>'form-control']) !!}
    </div>
    <div class="col s4">
        {!! Form::label('marca','Marca:')!!}
        {!! Form::text('marca', null,['class'=>'form-control']) !!}
    </div>
    <div class="col s4">
        {!! Form::label('modelo','Modelo:')!!}
        {!! Form::text('modelo', null,['class'=>'form-control']) !!}
    </div>
    <div class="col s12">
        {!! Form::label('descricao','Descrição:')!!}
        {!! Form::textarea('descricao', null,['class'=>'materialize-textarea','id'=>'descricao', 'placeholder'=>'Digite a descricão aqui']) !!}
    </div>
    <div class="col s12">
        {!! Form::label('preco','Preço:') !!}
        {!! Form::text('preco', null, ['class'=>'dinheiro']) !!}
    </div>
    <div class="col s12">
{{--        {!! Form::label('imagem','Imagem do premio:')!!}--}}
        <div class="file-field input-field">
            <div class="btn grey lighten-2 grey-text text-darken-1 flex-box box-shadow-0">
                <span>File</span>
                {!! Form::file('img_caminho', null,['class'=>'form-control']) !!}
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>

    </div>
</div>
