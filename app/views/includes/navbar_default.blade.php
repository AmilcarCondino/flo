
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
