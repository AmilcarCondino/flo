@section('content')

    <h2>{{ $photo->title }}</h2>


<div class="row show-grid">
    <div class="col-md-1">
        <a class="btn btn-success" href="/photos/{{$photo->id}}/edit" role="button">Editar</a>

            {{ Form::open(['method' => 'delete', 'route' => ['photos.destroy', $photo->id]]) }}

            {{ Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) }}

            {{ Form::close() }}

    </div>
    <div class="col-md-11">

        {{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}

        <h4>{{ $photo->description }}</h4>

    </div>
</div>

@stop




