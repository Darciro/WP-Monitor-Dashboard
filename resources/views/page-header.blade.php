<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if( isset ($title) )
            <a class="navbar-brand" href="#"><b>Você está aqui:</b></a>
            <a class="navbar-brand" href="#">{{ $title }}</a>
            @else
            <a class="navbar-brand" href="#"><b>Você está aqui:</b></a>
            <a class="navbar-brand" href="#">Home</a>
            @endif
        </div>
        @if (Auth::check())
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                {{--<li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p class="hidden-lg hidden-md">Notifications</p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Exemplo de aviso importante</a>
                        </li>
                        <li>
                            <a href="#">Mais um aviso</a>
                        </li>
                        <li>
                            <a href="#">Mensagem importante sobre o monitoramento</a>
                        </li>
                        <li>
                            <a href="#">Outra mensagem</a>
                        </li>
                        <li>
                            <a href="#">Mais uma</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">person</i>
                        <p class="hidden-lg hidden-md">Profile</p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Meu perfil</a>
                        </li>
                        <li>
                            <a href="#">Recuperar senha</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @endif
    </div>
</nav>