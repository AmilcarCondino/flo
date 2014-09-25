

@extends('layouts.default')

@section('content')

<h1>Listado de posts</h1>

<u>
    @foreach($posts as $post)
    <li>
        {{ link_to("/posts/{$post->id}", $post->title) }}
    </li>

    @endforeach
</u>




<h2>Crear un Nuevo Post</h2>
{{ HTML::link('posts/create', 'Crear') }}



@stop