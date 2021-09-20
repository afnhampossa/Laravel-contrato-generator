<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Yupe</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assetss/css/app.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/bundles/bootstrap-social/bootstrap-social.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="icon" href="{{ asset('template/assets/img/logo.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('assetss/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/img/favicon.png')}}">
</head>

<body style="background-color: #ff8093">
<div class="loader"></div>
<div id="app">

        <main class="py-4">
            @yield('content')
        </main>
</div>
<!-- General JS Scripts -->
<script src="{{ asset('assetss/js/app.min.js')}}"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="{{ asset('assetss/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{ asset('assetss/js/custom.js')}}"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>
