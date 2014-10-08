@section('content')

    <h1>Add a New Post</h1>

    <div class="container" style="color: #303030 ">
            {{  Form::open(array('url' => 'posts' )) }}


                    {{ Form::label('title', 'Titulo: ') }}<br />
                    {{ Form::text('title') }}


                    {{ Form::label('body', 'Descripcion: ') }}<br />
                    {{ Form::textarea('body') }}


                    {{ Form::submit('Nuevo Post') }}


            {{ Form::close() }}
    </div>

    {{ HTML::link('posts', 'Cancelar') }}

@stop