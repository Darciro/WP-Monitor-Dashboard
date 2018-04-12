@extends('template')

@section('content')
    <div class="flex-center">
        <div class="content">
            <div class="title m-b-md">
                Dashboard WordPress
            </div>
            <div class="links">
                <a href="{{ url('/') }}">Voltar para a página inicial</a>
            </div>
        </div>
    </div><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 position-ref">
                <div class="sidebar">
                    <div class="card-box">
                        <div>
                            <div class="wid-u-info">
                                <h4 class="header-title m-t-0" id="site-name">Site Name</h4>
                                <p class="text-muted m-b-5">Endereço: <a href="#" target="_blank" id="site-url">http:siteurl.com</a></p>
                                <p class="text-muted m-b-5">Email do administrador: <a href="#" target="_blank" id="admin-email">admin@mail.com</a></p>
                                <p class="text-muted m-b-5">Versão do WordPress: <span id="wordpress-version">0.0</span> <small id="has-update" class="hidden text-red">( Atualização disponível )</small></p>
                                <p class="text-muted m-b-5">Multisite: <span id="is-multisite">Não</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="widget-simple-chart text-right card-box">
                        <div class="circliful-chart circliful">
                            <canvas id="themes-installed" width="125" height="125"></canvas>
                        </div>
                        <h3 class="counter m-t-10" id="installed-themes">0</h3>
                        <h4 class="header-title m-t-0">Total de temas instalados</h4>
                        <small id="themes-with-update" class="text-red hidden"><b><span>0</span></b> com atualizações disponíveis</small>
                    </div>

                    <div class="widget-simple-chart text-right card-box">
                        <div class="circliful-chart circliful">
                            <canvas id="plugins-installed" width="125" height="125"></canvas>
                        </div>
                        <h3 class="counter m-t-10" id="installed-plugins">0</h3>
                        <h4 class="header-title m-t-0">Total de plugins instalados</h4>
                        <small id="plugins-with-update" class="text-red hidden"><b><span>0</span></b> com atualizações disponíveis</small>
                    </div>

                    <div class="widget-simple-chart text-right card-box">
                        <div class="circliful-chart circliful">
                            <canvas id="registered-users" width="150" height="125"></canvas>
                        </div>
                        <h3 class="counter m-t-10" id="installed-plugins">123</h3>
                        <h4 class="header-title m-t-0">Usuários cadastrados</h4>
                        <small id="admin-users" class="text-red"><b><span>12</span></b> Administradores</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div id="card-server-info" class="card-box">
                    <h4 class="header-title m-t-0">Informações do servidor</h4>
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

                <div id="card-site-themes" class="card-box">
                    <h4 class="header-title m-t-0">Temas</h4>
                    <p class="text-muted m-b-25 font-13">
                        Informações sobre todos os temas instalados no site
                    </p>
                    <div class="table-responsive" style="max-height: 400px;">
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

                <div id="card-site-plugins" class="card-box">
                    <h4 class="header-title m-t-0">Plugins</h4>
                    <p class="text-muted m-b-25 font-13">
                        Informações sobre todos os plugins instalados no site
                    </p>
                    <div class="table-responsive" style="max-height: 400px;">
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
@endsection

@push('scripts')
    <script src="{{ url('/js/dashboard.js')  }}"></script>
    <script>
        (function ($) {
            $(document).ready(function () {
                initHelpers();
                getSiteData("{{ $site_info_api_url }}");
                createTableData("{{ $server_info_api_url }}", '#card-server-info table');
                getSiteThemes("{{ $site_themes_api_url  }}");
                getSitePlugins("{{ $site_plugins_api_url  }}");
                getSiteUsers();
            });
        })(jQuery);
    </script>
@endpush