<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lance certo</title>
    <!-- Compiled and minified CSS -->

    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">

    <!-- Compiled and minified JavaScript -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
</head>
<body class="grey lighten-4">
<div class="container-home-princiapal">

    @yield('content')
</div>

<div style="display: none" class="carrega">
    <div class="carrega-box">
        <div class="preloader-wrapper big active ">
            <div class="spinner-layer spinner-red-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->

<script src="{{asset('js/jquery-2.2.2.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/funcoes.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.maskMoney.js')}}"></script>
@yield('scripts')


</body>
</html>