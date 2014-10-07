@section('content')

    <h1>{{ 'Editar registro' }}</h1>

    <div class="container" style="color: #303030 ">
        <div class="row show-grid">
            <div class="col-md-3">
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

                <p><a class="btn btn-danger" href="/posts" role="button">Cancear</a></p>

            </div>
        </div>
    </div>


@stop