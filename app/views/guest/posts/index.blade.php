@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Listado de posts</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item list-group-item-info">
                        {{ link_to("posts/{$post->id}", $post->title) }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


@stop