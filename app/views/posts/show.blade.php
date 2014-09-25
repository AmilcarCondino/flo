


@extends('layouts.default')

@section('content')

    <h1>{{ $post->title }}</h1>

    <p>{{ $post->body }}</p>

    <p>{{ link_to("/posts/{$post->id}/edit", 'Editar') }}</p>

    {{ Form::open(['method' => 'delete', 'route' => ['posts.destroy', $post->id]]) }}

        {{ Form::submit('Eliminar') }}

    {{ Form::close() }}

    <p>{{ HTML::link('posts', 'Posts') }}</p>
    <p>{{ HTML::link('/', 'Home') }}</p>
@stop





