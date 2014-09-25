

@extends('layouts.default')

@section('content')

    <h1>{{ 'Editar foto' }}</h1>


    {{  Form::model($photo, ['method' => 'PATCH', 'route' => ['photos.update', $photo->id]]) }}

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

        <p> {{ Form::submit('Editar Foto') }}</p>

    {{ Form::close() }}

    <p>{{ HTML::link('posts', 'Cancelar') }}</p>

@stop