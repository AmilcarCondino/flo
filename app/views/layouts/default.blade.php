<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>C.R.U.D</title>
        <!-- Core Bootstrap -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/css/crud.css" rel="stylesheet">


    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-default" role="navigation">
                <ul class="nav nav-pills">
                    <li>{{ HTML::link('/', 'Home') }}</li>
                    <li>{{ HTML::link('posts', 'Posts') }}</li>
                    <li>{{ HTML::link('photos', 'Fotos') }}</li>
                    <li>{{ HTML::link('login', 'Log in') }}</li>
                </ul>
            </div>
        </div>
    <div class="container">
        @if (Session::has('flash_message'))
        <div class="alert {{ Session::get('flash_type') }} " role="alert">
            {{ Session::get('flash_message') }}
        </div>
        @endif

        @yield('content')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <footer>
                    Just a c.r.u.d, by KeleK.
                </footer>
            </div>
        </div>
    </div>
    </body>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>

</html>