@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4">
                    <a class="btn btn-block btn-success" href="{{$post->id}}/edit" role="button">Editar</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    {{ Form::open(['method' => 'delete', 'route' => ['admin.posts.destroy', $post->id]]) }}
                        {{ Form::submit('Eliminar', array('class'=>'btn btn-block btn-sm-4 btn-danger')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4,  text-center">
            <h2  class="text-center">{{ $post->title }}</h2>
            <p class="text-center">{{ $post->body }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4, text-center">
            <h2  class="text-center">{{ $post_en->title }}</h2>
            <p class="text-center">{{ $post_en->body }}</p>
        </div>
    </div>

</div>

@stop





