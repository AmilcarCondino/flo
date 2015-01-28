<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>C.R.U.D</title>


        <!-- Core Bootstrap -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!-- Core jquery -->
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <!-- Include the JASNY plugin's CSS and JS: -->
        <script src="/js/jasny-bootstrap.js"></script>
        <link rel="stylesheet" href="/css/jasny-bootstrap.css">
        <!-- Include the MASONRY plugin's CSS and JS: -->
        <script src="/js/masonry.pkgd.min.js"></script>
        <!-- Custom CSS -->
        <link href="/css/crud.css" rel="stylesheet">
        <!-- jQuery ( JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- Include screenfull js -->
        <script src="/js/screenfull.js"></script>
        <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- Include the Magnific Popup plugin's CSS and JS: -->
        <script src="/js/Magnific-Popup-v1.0.0.js"></script>
        <link rel="stylesheet" href="/css/Mafnic-Popup.css">
        <!-- Include the Ferro Slide plugin's CSS and JS: -->
        <script src="/js/jquery.transit.min.js"></script>
        <script src="/js/jquery.ferro.ferroSlider-2.3.3.min.js"></script>
        <link rel="stylesheet" href="/css/jquery.ferro.ferroSlider.css">


    </head>
    <body>
        <div class="navbar-header navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">HOME</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @if ( Auth::check() )
                            <li>{{ HTML::link('admin', 'Dashboard') }}</li>
                        @else
                            <li>{{ HTML::link('login', 'Login') }}</li>
                        @endif
                            <li>{{ HTML::link('posts', 'Posts') }}</li>
                            <li>{{ HTML::link('photos', 'Fotos') }}</li>
                    </ul>
                </div>

            </div>
        </div>
        @if (Session::has('flash_message'))
        <div class="container">
            <div class="alert {{ Session::get('flash_type') }} " role="alert">
                {{ Session::get('flash_message') }}
            </div>
        </div>
        @endif

            @yield('content')

        <div class="footer">
            <div class="container">
                <p class="text-muted">Created by amilcar.condino@gmail.com</p>
            </div>
        </div>
    </body>
</html>