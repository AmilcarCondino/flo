@section('content')

    <h2 style="text-align: center">{{ $post->title }}</h2>

    <p style="text-align: center;  color: white;">{{ $post->body }}</p>

    <p><a class="btn btn-success" href="/posts/{{$post->id}}/edit" role="button">Editar</a></p>

    {{ Form::open(['method' => 'delete', 'route' => ['posts.destroy', $post->id]]) }}

        {{ Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) }}

    {{ Form::close() }}


@stop





