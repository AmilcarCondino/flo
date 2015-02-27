<?php
    $lan = Session::get('lan');
?>
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
                    </tr>
                </thead>
                    <tbody>
                        @foreach($photos as $photo)
                        @if($photo->language == 'es')
                            <tr>
                                <td>
                                    <a href="/admin/photos/{{ $photo->id }}">
                                        <img src="/uploads/images/{{$photo->img_name}}"class="img-responsive img-rounded" alt="Responsive image" style=" height: 50px">
                                    </a>
                                </td>
                                <td>
                                    {{$photo->title}}
                                </td>
                                <td>
                                    {{$photo->description}}
                                </td>
                                <td>
                                    @if($photo->show === 1)
                                        Si
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    @foreach($photo->collections as $collection)
                                        {{ $collection->title }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($photo->categories as $category)
                                        {{ $category->title }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($photo->tags as $tag)
                                        {{ $tag->title }}
                                    @endforeach
                                </td>
                                <td>
                                    {{$photo->created_at}}
                                </td>
                                <td>
                                    {{ Form::open(['method' => 'get', 'route' => ['admin.photos.edit', $photo->id]]) }}

                                        {{ Form::submit('Editar', array('class'=>'btn btn-sm btn-primary')) }}

                                    {{ Form::close() }}
                                </td>
                                <td>
                                    {{ Form::open(['method' => 'delete', 'route' => ['admin.photos.destroy', $photo->id]]) }}

                                        {{ Form::submit('Eliminar', array('class'=>'btn btn-xs btn-danger')) }}

                                    {{ Form::close() }}
                                </td>

                            </tr>
                        @endif
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@stop



