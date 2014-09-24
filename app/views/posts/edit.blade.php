





@extends('layouts.default')

@section('content')

    <h1>{{ 'Editar registro' }}</h1>


        {{  Form::model($post, ['method' => 'PATCH', 'route' => ['posts.update', $post->id]]) }}

        <p>
            {{ Form::label('title', 'Titlo: ') }}<br />
            {{ Form::text('title') }}
        </p>
        <p>
            {{ Form::label('body', 'Descripcion: ') }}<br />
            {{ Form::textarea('body') }}
        </p>
        <p>
            {{ Form::submit('Editar Post') }}
        </p>

        {{ Form::close() }}


    <p>{{ HTML::link('posts', 'Cancelar') }}</p>

@stop