<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .flex-column{
                flex-direction: column;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
             a{
                padding: 5px 12px;
                text-decoration: none;
                background-color: #41b6e6;
                color: #fff;
            }
            a:hover{
                background-color: #0076ce;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height flex-column">
            <div>
                <div class="flex-center">
                    <div class="code">
                        @yield('code')
                    </div>
        
                    <div class="message" style="padding: 10px;">
                        @yield('message')
                    </div>
                </div>
            </div>

            <div class="flex-column">
                <p>&nbsp;</p>
                <a href="{{url('/')}}">Go Home</a>
            </div>

        </div>
    </body>
</html>
