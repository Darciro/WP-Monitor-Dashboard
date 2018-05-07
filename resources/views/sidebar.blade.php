<div class="sidebar" data-color="{{ $dashboard_main_color or 'purple' }}">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text">Monitor WordPress</a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if (Auth::check())
                <li @if( Request::url() === url('/') ) class="active" @endif>
                    <a href="{{ url('/') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Página inicial</p>
                    </a>
                </li>
                <li @if( Request::url() === url('/sites') || Request::is('sites/*') && Request::url() !== url('/sites/create') ) class="active" @endif>
                    <a href="{{ url('/sites') }}">
                        <i class="material-icons">list</i>
                        <p>Sites monitorados</p>
                    </a>
                </li>
                <li @if( Request::url() === url('/sites/create') ) class="active" @endif>
                    <a href="{{ route('sites.create') }}">
                        <i class="material-icons">playlist_add</i>
                        <p>Novo site</p>
                    </a>
                </li>
                <li @if( Request::url() === url('/profile') ) class="active" @endif>
                    <a href="{{ url('/profile') }}">
                        <i class="material-icons">account_circle</i>
                        <p>Perfil</p>
                    </a>
                </li>
            @else
                <li @if( Request::url() === url('/login') ) class="active" @endif>
                    <a href="{{ url('/login') }}">
                        <i class="material-icons">account_circle</i>
                        <p>Login</p>
                    </a>
                </li>
                <li @if( Request::url() === url('/register') ) class="active" @endif>
                    <a href="{{ url('/register') }}">
                        <i class="material-icons">account_circle</i>
                        <p>Cadastro</p>
                    </a>
                </li>
            @endif
            <li @if( Request::url() === url('/about') ) class="active" @endif>
                <a href="{{ url('/about') }}">
                    <i class="material-icons">info_outline</i>
                    <p>Sobre</p>
                </a>
            </li>
        </ul>
    </div>
</div>