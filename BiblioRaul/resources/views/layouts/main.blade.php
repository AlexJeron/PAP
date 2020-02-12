<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link rel="icon" href="/img/Favicon.png">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    @yield('head')
    <link href="/css/app.css" rel="stylesheet">

</head>

<body class="{{ Request::path() === "login" ? "bg-gradient-primary" : "" }}"
    id="{{ Request::path() === "dashboard" ? "page-top" : "" }}">
    @yield('content')
</body>

<!-- JQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

@yield('scripts')

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/switch.js"></script>

</html>
