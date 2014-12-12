@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Listado de Posts<small><a class="btn btn-success pull-right" href="posts/create" role="button">Nuevo Post</a></small></h1>
        </div>
    </div>

    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Creación</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    {{$post->id}}
                                </td>
                                <td>
                                    {{$post->title}}
                                </td>
                                <td>
                                    {{$post->created_at}}
                                </td>
                                <td>
                                    {{ Form::open(['method' => 'get', 'route' => ['admin.posts.edit', $post->id]]) }}

                                        {{ Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) }}

                                    {{ Form::close() }}
                                </td>
                                <td>
                                    {{ Form::open(['method' => 'delete', 'route' => ['admin.posts.destroy', $post->id]]) }}

                                        {{ Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) }}

                                    {{ Form::close() }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@stop



