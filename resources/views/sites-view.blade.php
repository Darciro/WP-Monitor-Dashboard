@extends('template')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div id="loading-monitor" class="col-md-12 text-center">
                    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                    </svg>
                </div>
                <div id="loading-monitor-error" class="col-md-12 text-center hidden">
                    <div class="alert alert-danger" role="alert">
                        <i class="material-icons">warning</i><br> Ocorreu um erro durante o carregamento das informações.
                    </div>
                </div>
                <div id="monitor-area" class="hidden">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title">Geral</h4>
                                <p class="category">Informações gerais sobre o site</p>
                            </div>
                            <div class="card-content">
                                <div class="wid-u-info">
                                    <h4 class="header-title m-t-0" id="site-name">{{ $site->name  }}</h4>
                                    <p class="text-muted m-b-5">Endereço: <a href="#" target="_blank" id="site-url">{{ $site->url }}</a></p>
                                    <p class="text-muted m-b-5">Email do administrador: <a href="#" target="_blank" id="admin-email"></a></p>
                                    <p class="text-muted m-b-5">Versão do WordPress: <span id="wordpress-version"></span> <small id="has-update" class="hidden text-red">( Atualização disponível )</small></p>
                                    <p class="text-muted m-b-5">Multisite: <span id="is-multisite"></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Temas</h4>
                                <p class="category">Quantidade de temas instalados</p>
                            </div>
                            <div class="card-content">
                                <div class="widget-simple-chart text-right card-box">
                                    <div class="circliful-chart circliful" style="padding: 15px">
                                        <canvas id="themes-installed" width="125" height="125"></canvas>
                                    </div>
                                    <h3 class="counter m-t-10" id="installed-themes">0</h3>
                                    <h4 class="header-title m-t-0 card-category">Total de temas instalados</h4>
                                    <small id="themes-with-update" class="text-red hidden"><b><span>0</span></b> com atualizações disponíveis</small>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" data-background-color="orange">
                                <h4 class="title">Plugins</h4>
                                <p class="category">Quantidade de plugins instalados</p>
                            </div>
                            <div class="card-content">
                                <div class="widget-simple-chart text-right card-box">
                                    <div class="circliful-chart circliful" style="padding: 15px">
                                        <canvas id="plugins-installed" width="125" height="125"></canvas>
                                    </div>
                                    <h3 class="counter m-t-10" id="installed-plugins">0</h3>
                                    <h4 class="header-title m-t-0 card-category">Total de plugins instalados</h4>
                                    <small id="plugins-with-update" class="text-red hidden"><b><span>0</span></b> com atualizações disponíveis</small>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" data-background-color="green">
                                <h4 class="title">Usuários</h4>
                                <p class="category">Quantidade de usuários cadastrados.</p>
                            </div>
                            <div class="card-content">
                                <div class="widget-simple-chart text-right card-box">
                                    <div class="circliful-chart circliful" style="padding: 15px">
                                        <canvas id="registered-users" width="150" height="125"></canvas>
                                    </div>
                                    <h3 class="counter m-t-10" id="total-users">0</h3>
                                    <h4 class="header-title m-t-0 card-category">Usuários cadastrados</h4>
                                    <small id="admin-users" class="text-red"><b><span>0</span></b> Administradores</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">

                        <div class="card">
                            <div class="card-header" data-background-color="red">
                                <h4 class="title">Informações do servidor</h4>
                                <p class="category">Informações obtidas sobre o servidor onde o site está instalado</p>
                            </div>
                            <div class="card-content">
                                <div id="card-server-info" class="card-box">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Valor</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Temas</h4>
                                <p class="category">Informações sobre todos os temas instalados no site</p>
                            </div>
                            <div class="card-content">
                                <div id="card-site-themes" class="card-box">
                                    <div class="table-responsive" style="max-height: 400px; overflow: auto;">
                                        <table class="table table-fixed mb-0">
                                            <thead>
                                            <tr>
                                                <th class="min-col">#</th>
                                                <th>Nome</th>
                                                <th>Autor</th>
                                                <th>Versão</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" data-background-color="orange">
                                <h4 class="title">Plugins</h4>
                                <p class="category">Informações sobre todos os plugins instalados no site</p>
                            </div>
                            <div class="card-content">
                                <div id="card-site-plugins" class="card-box">
                                    <div class="table-responsive" style="max-height: 400px; overflow: auto;">
                                        <table class="table table-fixed table-fixed-cols-5 mb-0">
                                            <thead>
                                            <tr>
                                                <th class="min-col">#</th>
                                                <th>Nome</th>
                                                <th>Autor</th>
                                                <th>Versão</th>
                                                <th>Descrição</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if( isset( $wp_monitor_api_key ) )
    <script>
        var WPMonitorAPIKey = "{{ $wp_monitor_api_key }}",
            WPMonitorSiteBaseURL = "{{ $site->url }}";
    </script>
    @endif
@endpush