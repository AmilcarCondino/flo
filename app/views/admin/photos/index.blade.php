
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
                                    <?php
                                    $photoCollectionsId = DB::table('collection_photo')->where('photo_id',  $photo->id)->get();

                                    foreach ($photoCollectionsId as $collectionId) {

                                        $colection = DB::table('collections')->where('id', $collectionId->collection_id)->get();

                                        echo ($colection[0]->title).', '; }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    $photoCategoriesId = DB::table('category_photo')->where('photo_id',  $photo->id)->get();

                                    foreach ($photoCategoriesId as $categoryId) {

                                        $category = DB::table('categories')->where('id', $categoryId->category_id)->get();

                                        echo ($category[0]->title).', '; }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    $photoTagsId = DB::table('photo_tag')->where('photo_id',  $photo->id)->get();

                                    foreach ($photoTagsId as $tagId) {

                                        $tag = DB::table('tags')->where('id', $tagId->tag_id)->get();

                                        echo ($tag[0]->title).', '; }
                                    ?>
                                </th>
                                <th>
                                    {{$photo->created_at}}
                                </th>
                                <th>
                                    <a class="btn btn-xs btn-success" href="/admin/photos/{{$photo->id}}/edit" role="button">Editar</a>
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



