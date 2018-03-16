{{--{!! dd($pessoa) !!}--}}
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content ">
    <li><a href="{{route('userEdit',Auth()->user()->id)}}">Perfil</a></li>
    <li><a href="#!">Suporte</a></li>
    <li class="divider"></li>
    <li><a href="{{route('logout')}}">Sair</a></li>
</ul>
<nav class="grey grey lighten-5 menu-home">
    <div class="nav-wrapper">
        <div data-activates="slide-out" class="button-collapse bt-menu"><i
                    class="material-icons green-text text-accent-4">menu</i></div>


        <ul class="left-align">
            <li class="brand-logo green accent-4">

                <div class="center-align">
                    <h5><img class="logo-lc" src="{{asset('img/logo-lc.svg')}}"></h5>
                </div>

            </li>
        </ul>


        <ul class="right hide-on-med-and-down">

            <li><i class="material-icons green-text text-accent-4">account_circle</i></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button green-text text-accent-4" href="#!"
                   data-activates="dropdown1">{{Auth::user()->name}}<i
                            class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>


<!-- // imagem do gravatar -->
<?php
$email = Auth::user()->email;
$default = "https://www.somewhere.com/homestar.jpg";
$size = 100;
$grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;
?>
<!-- // imagem do gravatar -->

<!-- menu lateral -->
<ul id="slide-out" class="side-nav">
    <li>
        <div class="userView green accent-4">
            <div class="background">

            </div>
            <a href="#!user">
                <img class="circle foto-perfil" src="{{ $grav_url }}">
            </a>
            <a href="#!name"><span class="white-text name"><h5>{{Auth::user()->name}}</h5></span></a>
            <a href="#!email"><span class="white-text email">{{Auth::user()->email}}</span></a>
        </div>
    </li>


    @if (Request::path() != 'home')
        <li class="grey lighten-3"><a href="{{route('painel.admin')}}"><i class="material-icons">home</i>Home</a></li>
        <li>
            <div class="divider"></div>
        </li>
    @endif
    @if(Auth()->user()->tipo == 1 )
    <li>
        <a><h5 class="">Aplicações</h5></a>
    </li>

    <li>
        <a href="{{route('painel.admin.edicao')}}"><i class="material-icons">launch</i>Edições</a>
    </li>

    <li><a href="{{route('usuarios.lists')}}"><i class="material-icons">person</i>Usuários</a></li>

    {{--@if(isset($premio))--}}
    <li class="disabled"><a href="{{route('home.apuracao')}}"><i class="material-icons">card_giftcard</i>
            Apuracao</a></li>
    {{--@endif--}}

    <li><a href="{{route('home.apuracao.ganhador')}}"><i
                    class="material-icons">supervisor_account</i>Resultado</a></li>

    <li><a href="{{route('pessoa.list.celular')}}"><i class="material-icons">stay_primary_portrait</i>Telefones/SMS</a>
    </li>

    <li>
        <div class="divider"></div>
    </li>
    @endif
    {{--menu relatorios--}}
    <li>
        <a><h5 class="">Relatórios</h5></a>
    </li>
    <li><a href="#"><i class="material-icons">assignment_turned_in</i> Cards por edição</a></li>
    <li><a href="#"><i class="material-icons">monetization_on</i> Ganhos por edição</a></li>
    {{--menu relatorios--}}
</ul>
<!-- menu lateral -->