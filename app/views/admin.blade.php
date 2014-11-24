@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Panel de administracion</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 panel" style="margin-left: 2px">
            <h3 class="text-info">Categorias</h3>
            <a class="btn btn-sm btn-success " href="admin/categories/create" role="button" style="margin-bottom: 5px;">Crear una nueva categoria</a>
            <ul class="list-group">
                @foreach($categories as $category)
                <li class="list-group-item list-group-item-info">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>{{ $category->title }}</h5>
                        </div>
                        <div class="col-sm-3 btn-group" style="margin-top: 3px;">
                            <a class="btn btn-sm btn-success" href="admin/categories/{{$category->id}}/edit" role="button">Editar</a>
                        </div>
                        <div class="col-sm-3 btn-group btn-xs">
                            {{ Form::open(['method' => 'delete', 'route' => ['admin.categories.destroy', $category->id]]) }}
                                {{ Form::submit('Eliminar', array('class'=>'btn-group btn-xs btn-danger')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-3 panel" style="margin-left: 2px">
            <h3 class="text-info">Colecciones</h3>
            <a class="btn btn-sm btn-success " href="admin/collections/create" role="button" style="margin-bottom: 5px;">Crear una nueva coleccion</a>
            <ul class="list-group">
                @foreach($collections as $collection)
                <li class="list-group-item list-group-item-info">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>{{ $collection->title }}</h5>
                        </div>
                        <div class="col-sm-3 btn-group" style="margin-top: 3px;">
                            <a class="btn btn-sm btn-success" href="admin/collections/{{$collection->id}}/edit" role="button" >Editar</a>
                        </div>
                        <div class="col-sm-3 btn-group btn-xs">
                            {{ Form::open(['method' => 'delete', 'route' => ['admin.collections.destroy', $collection->id]]) }}
                                {{ Form::submit('Eliminar', array('class'=>'btn-group btn-xs btn-danger')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-sm-3 panel" style="margin-left: 2px">
            <h3 class="text-info">Etiquetas</h3>
            <a class="btn btn-sm btn-success " href="admin/tags/create" role="button" style="margin-bottom: 5px;">Crear una nueva etiqueta</a>
            <ul class="list-group">
                @foreach($tags as $tag)
                <li class="list-group-item list-group-item-info">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>{{ $tag->title }}</h5>
                        </div>
                        <div class="col-sm-3 btn-group" style="margin-top: 3px;">
                            <a class="btn btn-sm btn-success" href="admin/tags/{{$tag->id}}/edit" role="button">Editar</a>
                        </div>
                        <div class="col-sm-3 btn-group btn-xs">
                            {{ Form::open(['method' => 'delete', 'route' => ['admin.tags.destroy', $tag->id]]) }}
                                {{ Form::submit('Eliminar', array('class'=>'btn-group btn-xs btn-danger')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
