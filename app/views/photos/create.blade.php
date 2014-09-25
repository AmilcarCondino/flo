@extends('layouts.default')

@section('content')

    <h1>Agreguemos una Nueva Foto</h1>

        {{ Form::open(array('url' => 'photos', 'files' => true)) }}

            <p>
                {{ Form::file('image') }}
            </p>
            <p>
                {{ Form::label('title', 'Titulo: ') }}
                {{ Form::text('title') }}
            </p>
            <p>
                {{ Form::label('description', 'Descripción: ') }}
                {{ Form::textarea('description') }}
            </p>
            <p>
                {{ Form::label('category', 'Categoria: ') }}
                {{ Form::text('category') }}
            </p>
            <p>
                {{ Form::label('show', 'Mostrar: ') }}
                {{ Form::text('show') }}
            </p>

            <p> {{ Form::submit('Guardar Foto') }}</p>

        {{ Form::close() }}


@stop
