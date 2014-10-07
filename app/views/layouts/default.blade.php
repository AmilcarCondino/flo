<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>C.R.U.D</title>
        <!-- Core Bootstrap -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/css/carousel.css" rel="stylesheet">



    </head>
        <style>
            .flash-message {
                border: 1px dotted #000000;
                padding: 1em;
            }

            .flash-error {
                background: red;
                color: white;
            }

            .flash-success {
                background: green;
                color: #000000;
            }
        </style>


    <body style="background: #5a5a5a;">
    <div class="navbar-wrapper">
        <div class="container">

            <div class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">C.R.U.D</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li>{{ HTML::link('/', 'Home') }}</li>
                            <li>{{ HTML::link('posts', 'Posts') }}</li>
                            <li>{{ HTML::link('photos', 'Fotos') }}</li>
                            <li>{{ HTML::link('login', 'Log in') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container" style=" padding-bottom: 60px; padding-top: 60px">
        @if (Session::has('flash_message'))
        <div class="flash-message  {{ Session::get('flash_type') }} ">
            <p>{{ Session::get('flash_message') }}</p>
        </div>
        @endif

        @yield('content')
    </div>

    <footer style="background: darkgrey; text-align: center;">
        <div class="inner">
            <p>Just a c.r.u.d, by KeleK.</p>
        </div>
    </footer>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>