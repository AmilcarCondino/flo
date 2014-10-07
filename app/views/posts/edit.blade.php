@section('content')

    <h1>{{ 'Editar registro' }}</h1>

    <div class="container" style="color: #303030 ">
            {{  Form::model($post, ['method' => 'PATCH', 'route' => ['posts.update', $post->id]]) }}

                <p>
                    {{ Form::label('title', 'Titlo: ') }}<br />
                    {{ Form::text('title') }}
                </p>
                <p>
                    {{ Form::label('body', 'Descripcion: ') }}<br />
                    {{ Form::textarea('body') }}
                </p>
                <p>
                    {{ Form::submit('Editar Post') }}
                </p>

            {{ Form::close() }}

    </div>
    <p>{{ HTML::link('posts', 'Cancelar') }}</p>

@stop