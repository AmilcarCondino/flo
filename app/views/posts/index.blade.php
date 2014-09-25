

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
        <p>{{ HTML::link('posts/create', 'Crear') }}</p>

    <p>{{ HTML::link('/', 'Home') }}</p>



@stop