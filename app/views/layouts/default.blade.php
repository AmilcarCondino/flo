<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $lan = Session::get('lan');?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Flo Tucci</title>
        @if ($lan['language'] === 'en' )
        {{ App::setLocale('en') }}
        @endif
        @if ($lan['language'] ==='es')
        {{ App::setLocale('es') }}
        @endif
        <!-- Core Bootstrap -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!-- Core jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <!-- Include the JASNY plugin's CSS and JS: -->
        <script src="/js/jasny-bootstrap.js"></script>
        <link rel="stylesheet" href="/css/jasny-bootstrap.css">
        <!-- Include the MASONRY plugin's CSS and JS: -->
        <script src="/js/masonry.pkgd.min.js"></script>
        <!-- Include screenfull js -->
        <script src="/js/screenfull.js"></script>
        <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- Include the Magnific Popup plugin's CSS and JS: -->
        <script src="/js/Magnific-Popup-v1.0.0.js"></script>
        <link rel="stylesheet" href="/css/Mafnic-Popup.css">
        <!-- Include the Ferro Slide plugin's CSS and JS: -->
        <script src="/js/jquery.event.move.js"></script>
        <script src="/js/responsive-slider.js"></script>
        <link rel="stylesheet" href="/css/responsive-slider.css">
        <!-- Custom CSS -->
        <link href="/css/crud.css" rel="stylesheet">


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
                @if (Auth::check())
                    @include('includes.navbar_admin')
                @else
                    @include('includes.navbar_default')
                @endif

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