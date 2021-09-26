<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{cloudfrontUrl('images/favicon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{cloudfrontUrl('images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{cloudfrontUrl('images/favicon-16x16.png')}}">

    <title>La Remise en plus</title>

    <!-- Scripts -->
    <script src="{{cloudfrontUrl('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{cloudfrontUrl('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{cloudfrontUrl('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
      
        <main class="full-page login-page">
            @yield('content')
        </main>
    </div>
</body>
</html>
