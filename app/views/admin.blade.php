@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h2>Categorías
                <small><a class="btn btn-sm btn-success pull-right" href="{{ route('admin.categories.create') }}" role="button">Nueva Categoría</a></small>
            </h2>
            <table class="table table-hover table-condensed">
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td style="width: 50%">{{ $category->title }}</td>
                        <td>
                            {{ Form::open(['method' => 'get', 'route' => ['admin.categories.edit', $category->id]]) }}
                                {{ Form::submit('Editar', array('class'=>'btn btn-xs btn-primary')) }}
                            {{ Form::close() }}
                        </td>
                        <td>
                            {{ Form::open(['method' => 'delete', 'route' => ['admin.categories.destroy', $category->id]]) }}
                                {{ Form::submit('Eliminar', array('class'=>'btn btn-xs btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
            <h2>Colecciones
                <small><a class="btn btn-sm btn-success pull-right" href="{{ route('admin.collections.create') }}" role="button">Nueva Colección</a></small>
            </h2>
            <table class="table table-hover table-condensed">
                <tbody>
                    @foreach($collections as $category)
                    <tr>
                        <td style="width: 50%">{{ $category->title }}</td>
                        <td>
                            {{ Form::open(['method' => 'get', 'route' => ['admin.collections.edit', $category->id]]) }}
                                {{ Form::submit('Editar', array('class'=>'btn btn-xs btn-primary')) }}
                            {{ Form::close() }}
                        </td>
                        <td>
                            {{ Form::open(['method' => 'delete', 'route' => ['admin.collections.destroy', $category->id]]) }}
                                {{ Form::submit('Eliminar', array('class'=>'btn btn-xs btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
            <h2>Etiquetas
                <small><a class="btn btn-sm btn-success pull-right" href="{{ route('admin.tags.create') }}" role="button">Nueva Etiqueta</a></small>
            </h2>
            <table class="table table-hover table-condensed">
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td style="width: 50%">{{ $tag->title }}</td>
                        <td>
                            {{ Form::open(['method' => 'get', 'route' => ['admin.tags.edit', $tag->id]]) }}
                                {{ Form::submit('Editar', array('class'=>'btn btn-xs btn-primary')) }}
                            {{ Form::close() }}
                        </td>
                        <td>
                            {{ Form::open(['method' => 'delete', 'route' => ['admin.tags.destroy', $tag->id]]) }}
                                {{ Form::submit('Eliminar', array('class'=>'btn btn-xs btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
