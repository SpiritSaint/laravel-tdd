<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel TDD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #f4645f;
                color: #fff;
                font-family: 'Roboto', sans-serif;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
                text-shadow: -2px 2px 0px rgba(0,0,0,.25);
            }

            .links > a {
                color: #fff;
                padding: 0 50px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                text-shadow: 0px 1px 0px rgba(0,0,0,.25);
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    &nbsp;
                    <span class="typed"></span>
                </div>

                <div class="links">
                    <a href="/docs">Documentation</a>
                    <a href="/features">Features</a>
                    <a href="/installation">Installation</a>
                    <a href="https://github.com/demency/laravel-tdd">GitHub</a>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.6/typed.min.js"></script>
    <script>
        var options = {
            strings: ["Laravel + Test Driven Developments", "Laravel TDD"],
            typeSpeed: 150,
            backSpeed: 75,
            smartBackspace: true,
            loop: false,
            cursorChar: '',
            shuffle: false,
        }

        var typed = new Typed(".typed", options);
    </script>
</html>
