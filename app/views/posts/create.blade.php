@extends('layouts.default')

@section('content')

    <h1>Add a New Post</h1>

    {{  Form::open(array('url' => 'posts' )) }}

        <p>
            {{ Form::label('title', 'Titlo: ') }}<br />
            {{ Form::text('title') }}
        </p>
        <p>
            {{ Form::label('body', 'Descripcion: ') }}<br />
            {{ Form::textarea('body') }}
        </p>
        <p>
            {{ Form::submit('Nuevo Post') }}
        </p>

    {{ Form::close() }}



@stop