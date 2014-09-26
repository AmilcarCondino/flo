<!doctype html>
    <html>
        <head>
            <title>Default layuot</title>
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

        <body>

            @if (Session::has('flash_message'))
            <div class="flash-message  {{ Session::get('flash_type') }} ">
                <p>{{ Session::get('flash_message') }}</p>
            </div>
            @endif

            @yield('content')
        </body>
    </html>