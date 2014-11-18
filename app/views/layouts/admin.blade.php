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
        <!-- Core jquery -->
        <script src="/js/jquery-2.1.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <!-- Include the multi select plugin's CSS and JS: -->
        <script src="/js/bootstrap-select.js"></script>
        <link rel="stylesheet" href="/css/bootstrap-select.css">
        <!-- Include the JASNY plugin's CSS and JS: -->
        <script src="/js/jasny-bootstrap.js"></script>
        <link rel="stylesheet" href="/css/jasny-bootstrap.css">
        <!-- Include the MASONRY plugin's CSS and JS: -->
        <script src="/js/masonry-docs.js"></script>
<!--        <link rel="stylesheet" href="/css/masonry-docs.css">-->


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
                    <a class="navbar-brand" href="/admin">C.R.U.D</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>{{ HTML::link('/admin', 'Home') }}</li>
                        <li>{{ HTML::link('admin/posts', 'Posts') }}</li>
                        <li>{{ HTML::link('admin/photos', 'Fotos') }}</li>
                        <li>{{ HTML::link('admin/categories', 'categorias') }}</li>
                        <li>{{ HTML::link('admin/collections', 'colecciones') }}</li>
                        <li>{{ HTML::link('admin/tags', 'etiquetas') }}</li>
                        <li>{{ HTML::link('logout', 'Log out') }}</li>
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
        <script>
            $(document).ready(function(){
                $('.selectpicker').selectpicker({
                size: 4});
            });
        </script>
    </body>
</html>