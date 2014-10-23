@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Listado de etiquetas</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <ul class="list-group">
                @foreach($tags as $tag)
                    <li class="list-group-item list-group-item-info">
                        <div class="row">
                            <div class="col-sm-6">
                                {{ link_to("admin/tags/{$tag->id}", $tag->title) }}
                            </div>
                            <div class="col-sm-3">
                                <a class="btn btn-block btn-success" href="tags/{{$tag->id}}/edit" role="button">Editar</a>
                            </div>
                            <div class="col-sm-3">
                                {{ Form::open(['method' => 'delete', 'route' => ['admin.tags.destroy', $tag->id]]) }}
                                    {{ Form::submit('Eliminar', array('class'=>'btn btn-block btn-sm-4 btn-danger')) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <a class="btn btn-sm btn-success " href="tags/create" role="button">Crear una nueva etiqueta</a>
        </div>
    </div>
</div>
@stop