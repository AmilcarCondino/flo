@extends('layouts.default')

@section('content')

    <h1>Has llegado al Home</h1>

    <h2>{{ HTML::link('posts', 'Posts') }}</h2>
    <h2>{{ HTML::link('photos', 'Fotos') }}</h2>

@stop