
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>{{ HTML::link('/admin', Lang::get('messages.control_panel')) }}</li>
                        <li>{{ HTML::link('admin/posts', Lang::get('messages.news_admin')) }}</li>
                        <li>{{ HTML::link('admin/photos', Lang::get('messages.image_admin')) }}</li>
                        <li>{{ HTML::link('/admin/sliders', Lang::get('messages.slider_admin')) }}</li>
                        <li>{{ HTML::link('posts', Lang::get('messages.news')) }}</li>
                        <li>{{ HTML::link('photos', Lang::get('messages.image_gallery')) }}</li>
                        <li>{{ HTML::link('logout', 'Log out') }}</li>
                        <li>
                            {{  Form::open(array('method' => 'GET', 'url' => 'lang' )) }}

                            {{ Form::openGroup('language') }}
                            {{ Form::text('language', 'en', ['class' => 'hide']) }}
                            {{ Form::closeGroup() }}

                            <button class="btn btn-sm" type="submit"><img src="images/USA.gif"></button>

                            {{ Form::close() }}
                        </li>

                        <li>
                            {{  Form::open(array('method' => 'GET', 'url' => 'lang' )) }}

                            {{ Form::openGroup('language') }}
                            {{ Form::text('language', 'es', ['class' => 'hide']) }}
                            {{ Form::closeGroup() }}

                            <button class="btn btn-sm" type="submit"><img src="images/Spain.jpg"></button>

                            {{ Form::close() }}
                        </li>
                    </ul>
                </div>
