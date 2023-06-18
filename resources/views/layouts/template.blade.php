<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- MATERIALIZE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .sidenav-trigger {
            display: block !important;
        }

        nav i {
            min-width: 48px !important;
        }
    </style>
</head>
<body>

@include('components.navbar')

<!-- PRINCIPAL CONTENT -->
<div class="container">
    <div class="col s12 center-align">
        @yield('content')
    </div>
</div>
<!-- END PRINCIPAL CONTENT -->


<!-- FOTAWESOME -->
<script src="https://kit.fontawesome.com/860f00444a.js" crossorigin="anonymous"></script>

<!-- MATERIALIZE JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- jQUERY -->
<script src="{{asset('/js/jquery.js')}}"></script>

<!-- TEMPLATE JS -->
<script src="{{asset('/js/scripts.js') }}"></script>
</body>
</html>
