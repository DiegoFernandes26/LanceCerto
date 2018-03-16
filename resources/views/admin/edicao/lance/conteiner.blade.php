@extends('layout')
@include('admin.menu')
@section('content')
    {{--modal cadastro de card--}}

    {{--inicio formulário de cadastro de lances--}}
    {!! Form::open(['route'=>'edicao.lances.store','method'=>'post']) !!}
    {{--container conteudo--}}
    <div class="container" style="width: 960px !important; margin-top:100px;">


        <div class="row">
            <div class="col s12 topo-card">
                <div class="col s6 dados-edicao grey-text text-darken-3">
                    <h2 style="text-align:left">{{$ultEdicao->numero}}ª Edição</h2>
                    <p style="text-align:left">{{$ultEdicao->name}}</p>
                </div>

                {{--Só deve aparecer se ja existir alguma pessoa no banco de dados com o paramentro informado--}}
                @if(!empty($pessoa))
                    <div class="col s3 dados-edicao grey-text text-darken-4 ">
                        {!! Form::text('num_card',null,['placeholder'=>'Card Nº XXXXX', 'required']) !!}
                    </div>
                @else
                    <div class="col s3 dados-edicao grey-text text-darken-4 ">
                        {!! Form::text('num_card',null,['placeholder'=>'Card Nº XXXXX', 'required', 'disabled']) !!}
                    </div>

                @endif

                <div class="col s3 dados-edicao grey-text text-darken-4">
                    {{--abertura de formulario de busca--}}
                    {!! Form::open(['route'=>'edicao.pessoa.search','method'=>'get']) !!}
                    @if(!empty($pessoa))
                        {!! Form::text('busca','Cpf: '.(!empty($pessoa) ? $pessoa->cpf : $pessoa = null) ,['placeholder'=>'RG','disabled']) !!}
                    @else
                        {!! Form::text('busca','Cpf: '.(!empty($pessoa) ? $pessoa->cpf : $pessoa = null) ,['placeholder'=>'RG','disabled']) !!}
                    @endif

                    {!! Form::close() !!}
                    {{--fechamento formulario de busca--}}
                </div>

                <div class="col s3">
                    <div class="col-md-3">
                        {!! Form::select('tipo', $consultores, null, ['placeholder'=>'Consultor', 'required']) !!}
                    </div>
                </div>
            </div>
        </div>

        @if(empty($pessoa))
            <div class="teste">
                <div style="width: 100% !important;text-align:left">
                    {{--chama o formulario para inserção de uma nova pessoa--}}
                    @include('admin.edicao.pessoa.create')
                </div>
            </div>
        @else
            <div class="row">
                <div class="col s12">
                    <div class="grey-text text-darken-1">
                        <h3 style="text-align: left">CLIENTE: {{$pessoa->name}}</h3>
                        <h6><strong>Telefone: </strong>{{$pessoa->celular}}</h6>
                        <h6><strong>E-mail: </strong>{{$pessoa->email}}</h6>
                    </div>
                </div>
            </div>

            {{--mostra os premios e o formulário de cadastro de lances--}}
            @if($errors->any())
                <ul class="alert">
                    @foreach($errors->all() as $erro)
                        <li>{{$erro}}</li>
                    @endforeach
                </ul>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @foreach($ultEdicao->premio as $premios)

                <div class="row"">

                <div class="col s3">
                    <div class="col s12">
                        <div class="card grey lighten-4">
                            <div class="card-image valign-wrapper">
                                <img src="{{asset($premios->img_caminho)}}">
                                <span class="card-title">{{$premios->name}}</span>
                            </div>
                            <div class="card-content">
                                <label>Valor do lance</label>
                                {!! Form::text('valor_lance[]', null,['class' => 'dinheiro input-lance', 'placeholder'=>'R$ 00,00', 'required' ]) !!}
                                {!! Form::hidden('premio_id[]', $premios->id) !!}
                            </div>
                            <div class="card-action">
                                {{--<a href="#">This is a link</a>--}}
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
            <div class="row"><br>
                <div class="col s12">
                    {!! Form::submit('Enviar Card',  ['class'=>'waves-effect waves-light btn btn-large blue lighten-2 text-darken-1 flex-box box-shadow-0 __cem']) !!}
                </div>
            </div>
        @endif


    </div>
    {!! Form::hidden('user_id', auth()->user()->id )!!}
    {!! Form::hidden('pessoa_id', (!empty($pessoa) ? $pessoa->id : $pessoa = null) )!!}
    {!! Form::hidden('edicao_id', $ultEdicao->id )!!}

    {!! Form::close() !!}
    {{--fim formulário cadastro de lances--}}

@endsection