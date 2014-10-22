@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-4">
            <h2>{{ $photo->title }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4">
                    <a class="btn btn-block btn-success" href="/photos/{{$photo->id}}/edit" role="button">Editar</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    {{ Form::open(['method' => 'delete', 'route' => ['photos.destroy', $photo->id]]) }}

                    {{ Form::submit('Eliminar', array('class'=>'btn btn-sm btn-danger')) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-8">
                {{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <h5>{{ $photo->description }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>




@stop




