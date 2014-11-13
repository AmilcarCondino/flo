<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>C.R.U.D</title>


        <!-- Core Bootstrap -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!-- Ferroslider CSS -->
        <link href="/css/jquery.ferro.ferroSlider.css" rel="stylesheet">
<!--        <link href="/css/font-awesome-ie7.min.css" rel="stylesheet">-->
<!--        <link href="/css/font-awesome.min.css" rel="stylesheet">-->
<!--        <link href="/css/jquery.ferro.ferroSlider.css" rel="stylesheet">-->
        <!-- Custom CSS -->
        <link href="/css/crud.css" rel="stylesheet">
        <!-- jQuery ( JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
<!--        <script src="/js/jquery.ferro.ferroSlider-2.3.3.min.js"></script>-->
<!--        <script src="/js/jquery.transit.min.js"></script>-->


    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">C.R.U.D</a>
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
        <div class="container">
            @if (Session::has('flash_message'))
            <div class="alert {{ Session::get('flash_type') }} " role="alert">
                {{ Session::get('flash_message') }}
            </div>
            @endif

            @yield('content')
        </div>
        <div class="footer">
            <div class="container">
                <p class="text-muted">Just a c.r.u.d, by KeleK.</p>
            </div>
        </div>



    </body>
</html>