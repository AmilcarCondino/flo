


@extends('layouts.default')

@section('content')

    <h1>{{ $photo->title }}</h1>

    <p>{{ link_to("/photos/{$photo->id}/edit", 'Editar') }}</p>

    <p>{{ HTML::image("/uploads/images/{$photo->img_name}", 'foto', array('width' => '500')) }}</p><br />

    <p>{{ $photo->description }}</p>


    {{ Form::open(['method' => 'delete', 'route' => ['photos.destroy', $photo->id]]) }}

    {{ Form::submit('Eliminar') }}

    {{ Form::close() }}


    <p>{{ HTML::link('photos', 'Home') }}</p>
@stop




