<!doctype html>
<html lang="pt-br" class="perfect-scrollbar-off">

<head>
    <title>{{ $title or 'Laravel App' }}</title>
    <meta charset="utf-8" />
    {{--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />--}}
    {{--<link rel="icon" type="image/png" href="../assets/img/favicon.png" />--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}">

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>
</head>

<body>
    <div class="wrapper">

        @include('sidebar')

        <div class="main-panel">
            @include('page-header')
            @yield('content')
        </div>

    </div>

    <script src="{{ url('/js/app.js')  }}"></script>
    <script src="{{ url('/js/dashboard.js')  }}"></script>
    @stack('scripts')
</body>
</html>
