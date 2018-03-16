@extends('layout')
@include('admin.menu')
@section('content')
    {{--<div class="container">
        @foreach($celular as $cul)
            Nº Celular: {{$cul}}<br>
        @endforeach
    </div>--}}

    <?php
    $arquivo = fopen("download/celular.txt", "w");
    ?>
    @foreach($celular as $cel)
        <?php
        $texto = "," . $cel;
        fwrite($arquivo, $texto);
        ?>
    @endforeach
    <?php
    fclose($arquivo);

    ?>


    <div class="container box-content">
        <a href="{{asset('download/celular.txt')}}" class="waves-effect waves-light btn-large green accent-4" download><i class="material-icons right">file_download</i>Baixar arquivo de números</a>
    </div>
@stop

