<?php

class Post extends Model {
	protected $fillable = [];

    protected static $rules = [
        'title' => array('required', 'unique:photos,title,[id]', 'min:3'),
        'body' => array('required','max:140')

    ];

    protected static $messages = [
        'title.required' => 'El campo "Titulo", es obligatorio.',
        'title.unique' => 'Este Titulo ya existe en otra publicacion.',
        'title.min' => 'El Titulo debe ser mayor a 3 caracteres.',
        'body.required' => 'La descripcion es obligatoria',
        'bodi.max' => 'La descripcio no puede superar los 140 caracteres'


    ];
}