@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Listado de categorias</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item list-group-item-content">
                        <div class="row">
                            <div class="col-sm-6">
                                {{ $category->title }}
                            </div>
                            <div class="col-sm-3">
                                <a class="btn btn-block btn-success" href="{{ route['admin.categories.edit', $category->id] }}" role="button">Editar</a>
                            </div>
                            <div class="col-sm-3">
                                {{ Form::open(['method' => 'delete', 'route' => ['admin.categories.destroy', $category->id]]) }}
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
            <a class="btn btn-sm btn-success " href="categories/create" role="button">Crear una nueva categoria</a>
        </div>
    </div>
</div>
@stop