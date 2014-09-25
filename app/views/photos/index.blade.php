

@extends('layouts.default')

@section('content')

<h1>Listado de Fotos</h1>

<u>
    @foreach($photos as $photo)
    <li>
        {{ link_to("/photos/{$photo->id}", $photo->title) }}
        {{ HTML::image("/img/{$photo->img_name}", 'foto', array('width' => '150')) }}
    </li>

    @endforeach
</u>




<h2>Gurdar una Nueva Foto</h2>
{{ HTML::link('photos/create', 'Guardar') }}



@stop