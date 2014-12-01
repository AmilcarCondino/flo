
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <a class="btn btn-success" href="photos/create" role="button">Nueva Foto</a>
        </div>
    </div>

    <div class="row">
        <div class="table table-hover">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Comentario</th>
                        <th>Show</th>
                        <th>Coleccion</th>
                        <th>Categoria</th>
                        <th>Etiqueta</th>
                        <th>Creacion</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($photos as $photo)
                            <tr>
                                <th>
                                    <a href="/admin/photos/{{ $photo->id }}">
                                        <img src="/uploads/images/{{$photo->img_name}}"class="img-responsive img-rounded" alt="Responsive image" style=" width: 250px">
                                    </a>
                                </th>
                                <th>
                                    {{$photo->title}}
                                </th>
                                <th>
                                    {{$photo->description}}
                                </th>
                                <th>
                                    @if($photo->show === 1)
                                        Si
                                    @else
                                        No
                                    @endif
                                </th>
                                <th>
                                    @foreach($photo->collections as $collection)
                                        {{ $collection->title }}
                                    @endforeach
                                </th>
                                <th>
                                    @foreach($photo->categories as $category)
                                        {{ $category->title }}
                                    @endforeach
                                </th>
                                <th>
                                    @foreach($photo->tags as $tag)
                                        {{ $tag->title }}
                                    @endforeach
                                </th>
                                <th>
                                    {{$photo->created_at}}
                                </th>
                                <th>
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.photos.edit', $photo->id) }}" role="button">Editar</a>
                                </th>
                                <th>
                                    {{ Form::open(['method' => 'delete', 'route' => ['admin.photos.destroy', $photo->id]]) }}

                                        {{ Form::submit('Eliminar', array('class'=>'btn btn-xs btn-danger')) }}

                                    {{ Form::close() }}
                                </th>

                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@stop



