<div class="container">
    <header class="header">
        <div class="row"> 
            <div class="col-md-5 col-md-offset-1">          
                <img class="logo img img-responsive pull-left" src="{{ asset('img/cne.png') }}" alt="">
            </div>
            <div class="col-md-5">          
                <img class="logo2 img img-responsive pull-right" src="{{ asset('img/gbv.png') }}" alt="">
            </div>
        </div>
    </header>
</div>
<!-- Navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
	       @if(Auth::user())

           
            <li class="nav-li">
                <a class="nav-li text-center" href="{{ route('solicituds.index') }}" id="solicituds">Solicitudes</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="{{ route('receptors.index') }}" id="receptors">Receptores</a>
            </li>
            <li class="nav-li">
                <a class="nav-li text-center" href="{{ route('tipoactas.index') }}" id="tipoactas">Tipos de Actas</a>
            </li>
             @if(Auth::user()->tipo == "Admin")
            <li class="nav-li">
                <a class="nav-li text-center" href="{{ route('users.index') }} " id="users">Usuarios</a>
            </li>
            @endif
            <li>
                <a href="{{ route('auth.logout') }}"> Salir </a>
            </li>
            @endif
            </ul>           
        </div>
    </div>
</div>