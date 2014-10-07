@section('content')

    <h2 style="text-align: center">{{ $photo->title }}</h2>



    <p><a class="btn btn-success" href="/photos/{{$photo->id}}/edit" role="button">Editar</a></p>
    <p>
        {{ Form::open(['method' => 'delete', 'route' => ['photos.destroy', $photo->id]]) }}

        {{ Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) }}

        {{ Form::close() }}
    </p>



    <p style="text-align: center">{{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}</p><br />

    <h4 style="text-align: center">{{ $photo->description }}</h4>




@stop




