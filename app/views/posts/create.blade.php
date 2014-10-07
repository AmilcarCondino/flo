@section('content')

    <h1>Add a New Post</h1>

    <div class="container" style="color: #303030 ">
            {{  Form::open(array('url' => 'posts' )) }}

                <p>
                    {{ Form::label('title', 'Titulo: ') }}<br />
                    {{ Form::text('title') }}
                </p>
                <p>
                    {{ Form::label('body', 'Descripcion: ') }}<br />
                    {{ Form::textarea('body') }}
                </p>
                <p>
                    {{ Form::submit('Nuevo Post') }}
                </p>

            {{ Form::close() }}
    </div>

    <p>{{ HTML::link('posts', 'Cancelar') }}</p>

@stop