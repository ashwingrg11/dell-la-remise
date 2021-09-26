<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La Remise en plus</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @if(env('APP_ENV') != 'production')
        <meta name="robots" content="noindex, nofollow" />
    @endif

    <link rel="apple-touch-icon" sizes="180x180" href="{{cloudfrontUrl('images/favicon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{cloudfrontUrl('images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{cloudfrontUrl('images/favicon-16x16.png')}}">
    <link rel="stylesheet" href="{{cloudfrontUrl('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{cloudfrontUrl('css/style.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500,700&display=swap" rel="stylesheet">

    @if(env('APP_ENV') == 'production')
        <!-- Matomo Tag Manager -->
        <script type="text/javascript">
            var _mtm = _mtm || [];
            _mtm.push({'mtm.startTime': (new Date().getTime()), 'event': 'mtm.Start'});
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src='https://cdn.matomo.cloud/aximpro.matomo.cloud/container_de4hzW8O.js'; s.parentNode.insertBefore(g,s);
        </script>
        <!-- End Matomo Tag Manager -->
    @endif
</head>
<body>
    <header class="header @if (Request::path() != '/') inner-header  @endif ">
        <div class="container">
            <div class="row">
                <div class="col-auto col-lg-3 logo-wrap">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{cloudfrontUrl('images/delltech-logo.svg')}}" alt="DELL Technologies"></a>
                    </div>
                </div>
                <div class="col-auto col-lg-9 parter-logo-wrap">
                    <div class="partner-logos">
                        <ul>
                            <li class="ms-logo-slogan windows-10"><img src="{{cloudfrontUrl('images/Windows_10_Pro.png')}}" alt="windows_10_pro_blue">
                            <p>Windows 10 Professionnel</p>
                            <p>répond aux besoins spécifiques des entreprises.</p>
                            </li>
                            <li class="ms-logo-slogan">
                            <img src="{{cloudfrontUrl('images/ms-logo.svg')}}" alt="Microsoft">
                                <p>Windows Server 2019:</p>
                                <p>Le système d'exploitation qui relie les installations sur site et dans le Cloud.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
@yield('content')
