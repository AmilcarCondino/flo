@section('content')

    <h2 style="text-align: center">{{ $photo->title }}</h2>


<div class="row show-grid">
    <div class="col-md-1">
        <p><a class="btn btn-success" href="/photos/{{$photo->id}}/edit" role="button">Editar</a></p>
        <p>
            {{ Form::open(['method' => 'delete', 'route' => ['photos.destroy', $photo->id]]) }}

            {{ Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) }}

            {{ Form::close() }}
        </p>
    </div>
    <div class="col-md-11">

        <p style="text-align: center">{{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}</p><br />

        <h4 style="text-align: center">{{ $photo->description }}</h4>

</div>


@stop




