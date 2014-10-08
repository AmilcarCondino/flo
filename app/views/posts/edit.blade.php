@section('content')

    <h1>{{ 'Editar registro' }}</h1>

    <div class="container" style="color: #303030 ">
        <div class="row show-grid">
            <div class="col-md-3">
            {{  Form::model($post, ['method' => 'PATCH', 'route' => ['posts.update', $post->id]]) }}


                    {{ Form::label('title', 'Titlo: ') }}<br />
                    {{ Form::text('title') }}


                    {{ Form::label('body', 'Descripcion: ') }}<br />
                    {{ Form::textarea('body') }}


                    {{ Form::submit('Editar Post') }}


            {{ Form::close() }}

                <a class="btn btn-danger" href="/posts" role="button">Cancear</a>

            </div>
        </div>
    </div>


@stop