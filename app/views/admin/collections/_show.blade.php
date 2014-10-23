@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-4">
                    <a class="btn btn-block btn-success" href="{{$category->id}}/edit" role="button">Editar</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    {{ Form::open(['method' => 'delete', 'route' => ['admin.categories.destroy', $category->id]]) }}
                        {{ Form::submit('Eliminar', array('class'=>'btn btn-block btn-sm-4 btn-danger')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <h2  class="text-center">{{ $category->title }}</h2>
        </div>
    </div>
</div>

@stop





