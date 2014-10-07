@section('content')

    <h1>Listado de posts</h1>

        <u>
            @foreach($posts as $post)
            <li>
                {{ link_to("/posts/{$post->id}", $post->title) }}
            </li>

            @endforeach
        </u>
    <br/>
     <p><a class="btn btn-sm btn-success" href="posts/create" role="button">Crear un nuevo post</a></p>



@stop