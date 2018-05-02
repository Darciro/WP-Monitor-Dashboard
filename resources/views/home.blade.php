@extends('template')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Sites monitorados</p>
                            <h3 class="title">{{ count($sites) }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">add_to_queue</i>
                                <a href="{{ route('sites.create') }}">Adicionar novo site</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Usuários do sistema</p>
                            <h3 class="title">4</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> Last 24 Hours
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Criticidade</p>
                            <h3 class="title">75</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Tracked from Github
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="card-content">
                            <p class="category">Foobar</p>
                            <h3 class="title">+245</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="red">
                            <div style="padding: 25px 50px">
                                <canvas class="ct-chart" id="criticity-chart"></canvas>
                            </div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Site Críticaço</h4>
                            <p class="category">Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">warning</i> Aqui vem algum aviso importante
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="red">
                            <div style="padding: 25px 50px">
                                <canvas class="ct-chart" id="criticity-chart-2"></canvas>
                            </div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Site 2, menos crítico</h4>
                            <p class="category">Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> Quem sabe alguma sugestão
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="orange">
                            <div style="padding: 25px 50px">
                                <canvas class="ct-chart" id="criticity-chart-3"></canvas>
                            </div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Site Moderadus</h4>
                            <p class="category">increase in today sales.</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> Relaxa que aqui tá tudo certo!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="orange">
                            <div style="padding: 25px 50px">
                                <canvas class="ct-chart" id="criticity-chart-4"></canvas>
                            </div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Site marromeno</h4>
                            <p class="category">Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">warning</i> Aqui vem algum aviso importante
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="green">
                            <div style="padding: 25px 50px">
                                <canvas class="ct-chart" id="criticity-chart-5"></canvas>
                            </div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Site Tranquilus</h4>
                            <p class="category">Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> Quem sabe alguma sugestão
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="green">
                            <div style="padding: 25px 50px">
                                <canvas class="ct-chart" id="criticity-chart-6"></canvas>
                            </div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Site De bobs</h4>
                            <p class="category">increase in today sales.</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> Relaxa que aqui tá tudo certo!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="purple">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Tasks:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#profile" data-toggle="tab">
                                                <i class="material-icons">bug_report</i> Bugs
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#messages" data-toggle="tab">
                                                <i class="material-icons">code</i> Website
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#settings" data-toggle="tab">
                                                <i class="material-icons">cloud</i> Server
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" checked>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" checked>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="messages">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" checked>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes" checked>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Employees Stats</h4>
                            <p class="category">New employees on 15th September, 2016</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Country</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Company
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blog
                        </a>
                    </li>
                </ul>
            </nav>
            <p class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
            </p>
        </div>
    </footer>
    {{--<div class="flex-centerX position-refX {{ Request::is('dashboard') ? '' : 'full-height' }}">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel App
            </div>

            <div class="links">
                <a href="{{ url('/dashboard') }}">Dashboard</a>
                <a href="{{ url('/sites') }}">Sites</a>
                <a href="https://laravel.com/docs">Documentation</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>--}}
@endsection

@push('scripts')
    <script>
        (function ($) {
            $(document).ready(function () {
                console.log('Foobar');

                type = ['', 'info', 'success', 'warning', 'danger'];


                demo = {
                    initPickColor: function() {
                        $('.pick-class-label').click(function() {
                            var new_class = $(this).attr('new-class');
                            var old_class = $('#display-buttons').attr('data-class');
                            var display_div = $('#display-buttons');
                            if (display_div.length) {
                                var display_buttons = display_div.find('.btn');
                                display_buttons.removeClass(old_class);
                                display_buttons.addClass(new_class);
                                display_div.attr('data-class', new_class);
                            }
                        });
                    },

                    initDocumentationCharts: function() {
                        /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

                        dataDailySalesChart = {
                            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                            series: [
                                [12, 17, 7, 17, 23, 18, 38]
                            ]
                        };

                        optionsDailySalesChart = {
                            lineSmooth: Chartist.Interpolation.cardinal({
                                tension: 0
                            }),
                            low: 0,
                            high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                            chartPadding: {
                                top: 0,
                                right: 0,
                                bottom: 0,
                                left: 0
                            },
                        }

                        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

                        md.startAnimationForLineChart(dailySalesChart);
                    },

                    initDashboardPageCharts: function() {

                        /* ----------==========     Daily Sales Chart initialization    ==========---------- */

                        dataDailySalesChart = {
                            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                            series: [
                                [12, 17, 7, 17, 23, 18, 38]
                            ]
                        };

                        optionsDailySalesChart = {
                            lineSmooth: Chartist.Interpolation.cardinal({
                                tension: 0
                            }),
                            low: 0,
                            high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                            chartPadding: {
                                top: 0,
                                right: 0,
                                bottom: 0,
                                left: 0
                            },
                        }

                        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

                        md.startAnimationForLineChart(dailySalesChart);



                        /* ----------==========     Completed Tasks Chart initialization    ==========---------- */

                        /*dataCompletedTasksChart = {
                            labels: ['12am', '3pm', '6pm', '9pm', '12pm', '3am', '6am', '9am'],
                            series: [
                                [230, 750, 450, 300, 280, 240, 200, 190]
                            ]
                        };

                        optionsCompletedTasksChart = {
                            lineSmooth: Chartist.Interpolation.cardinal({
                                tension: 0
                            }),
                            low: 0,
                            high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                            chartPadding: {
                                top: 0,
                                right: 0,
                                bottom: 0,
                                left: 0
                            }
                        }

                        var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);*/

                        // start animation for the Completed Tasks Chart - Line Chart
                        // md.startAnimationForLineChart(completedTasksChart);


                        /* ----------==========     Emails Subscription Chart initialization    ==========---------- */

                        var dataEmailsSubscriptionChart = {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            series: [
                                [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]

                            ]
                        };
                        var optionsEmailsSubscriptionChart = {
                            axisX: {
                                showGrid: false
                            },
                            low: 0,
                            high: 1000,
                            chartPadding: {
                                top: 0,
                                right: 5,
                                bottom: 0,
                                left: 0
                            }
                        };
                        var responsiveOptions = [
                            ['screen and (max-width: 640px)', {
                                seriesBarDistance: 5,
                                axisX: {
                                    labelInterpolationFnc: function(value) {
                                        return value[0];
                                    }
                                }
                            }]
                        ];
                        var emailsSubscriptionChart = Chartist.Bar('#emailsSubscriptionChart', dataEmailsSubscriptionChart, optionsEmailsSubscriptionChart, responsiveOptions);

                        //start animation for the Emails Subscription Chart
                        md.startAnimationForBarChart(emailsSubscriptionChart);

                    },

                    initGoogleMaps: function() {
                        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
                        var mapOptions = {
                            zoom: 13,
                            center: myLatlng,
                            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
                            styles: [{
                                "featureType": "water",
                                "stylers": [{
                                    "saturation": 43
                                }, {
                                    "lightness": -11
                                }, {
                                    "hue": "#0088ff"
                                }]
                            }, {
                                "featureType": "road",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "hue": "#ff0000"
                                }, {
                                    "saturation": -100
                                }, {
                                    "lightness": 99
                                }]
                            }, {
                                "featureType": "road",
                                "elementType": "geometry.stroke",
                                "stylers": [{
                                    "color": "#808080"
                                }, {
                                    "lightness": 54
                                }]
                            }, {
                                "featureType": "landscape.man_made",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#ece2d9"
                                }]
                            }, {
                                "featureType": "poi.park",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#ccdca1"
                                }]
                            }, {
                                "featureType": "road",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#767676"
                                }]
                            }, {
                                "featureType": "road",
                                "elementType": "labels.text.stroke",
                                "stylers": [{
                                    "color": "#ffffff"
                                }]
                            }, {
                                "featureType": "poi",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            }, {
                                "featureType": "landscape.natural",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "visibility": "on"
                                }, {
                                    "color": "#b8cb93"
                                }]
                            }, {
                                "featureType": "poi.park",
                                "stylers": [{
                                    "visibility": "on"
                                }]
                            }, {
                                "featureType": "poi.sports_complex",
                                "stylers": [{
                                    "visibility": "on"
                                }]
                            }, {
                                "featureType": "poi.medical",
                                "stylers": [{
                                    "visibility": "on"
                                }]
                            }, {
                                "featureType": "poi.business",
                                "stylers": [{
                                    "visibility": "simplified"
                                }]
                            }]

                        }
                        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            title: "Hello World!"
                        });

                        // To add the marker to the map, call setMap();
                        marker.setMap(map);
                    },

                    showNotification: function(from, align) {
                        color = Math.floor((Math.random() * 4) + 1);

                        $.notify({
                            icon: "notifications",
                            message: "Welcome to <b>Material Dashboard</b> - a beautiful freebie for every web developer."

                        }, {
                            type: type[color],
                            timer: 4000,
                            placement: {
                                from: from,
                                align: align
                            }
                        });
                    }



                }

                demo.initDashboardPageCharts();

                var ctx = document.getElementById('criticity-chart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            'Score negativo',
                            'Total'
                        ],
                        datasets: [{
                            data: [75, 35],
                            backgroundColor: ['#981309', '#fff']
                        }]
                    },
                    options: {
                        rotation: -1.0 * Math.PI, // start angle in radians
                        circumference: Math.PI, // sweep angle in radians
                        responsive: true,
                        legend: {
                            display: false
                        }
                    }
                });

                var ctx = document.getElementById('criticity-chart-2').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            'Score negativo',
                            'Total'
                        ],
                        datasets: [{
                            data: [62, 35],
                            backgroundColor: ['#981309', '#fff']
                        }]
                    },
                    options: {
                        rotation: -1.0 * Math.PI, // start angle in radians
                        circumference: Math.PI, // sweep angle in radians
                        responsive: true,
                        legend: {
                            display: false
                        }
                    }
                });

                var ctx = document.getElementById('criticity-chart-3').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            'Score negativo',
                            'Total'
                        ],
                        datasets: [{
                            data: [50, 100],
                            backgroundColor: ['#a95d00', '#fff']
                        }]
                    },
                    options: {
                        rotation: -1.0 * Math.PI, // start angle in radians
                        circumference: Math.PI, // sweep angle in radians
                        responsive: true,
                        legend: {
                            display: false
                        }
                    }
                });

                var ctx = document.getElementById('criticity-chart-4').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            'Score negativo',
                            'Total'
                        ],
                        datasets: [{
                            data: [45, 100],
                            backgroundColor: ['#a95d00', '#fff']
                        }]
                    },
                    options: {
                        rotation: -1.0 * Math.PI, // start angle in radians
                        circumference: Math.PI, // sweep angle in radians
                        responsive: true,
                        legend: {
                            display: false
                        }
                    }
                });

                var ctx = document.getElementById('criticity-chart-5').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            'Score negativo',
                            'Total'
                        ],
                        datasets: [{
                            data: [12, 100],
                            backgroundColor: ['#044604', '#fff']
                        }]
                    },
                    options: {
                        rotation: -1.0 * Math.PI, // start angle in radians
                        circumference: Math.PI, // sweep angle in radians
                        responsive: true,
                        legend: {
                            display: false
                        }
                    }
                });

                var ctx = document.getElementById('criticity-chart-6').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            'Score negativo',
                            'Total'
                        ],
                        datasets: [{
                            data: [3, 100],
                            backgroundColor: ['#044604', '#fff']
                        }]
                    },
                    options: {
                        rotation: -1.0 * Math.PI, // start angle in radians
                        circumference: Math.PI, // sweep angle in radians
                        responsive: true,
                        legend: {
                            display: false
                        }
                    }
                });
            });
        })(jQuery);
    </script>
@endpush