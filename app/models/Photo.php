<?php

class Photo extends Model {
	protected $fillable = [];

    protected static $rules = [
        'title' => array('required', 'unique:photos,title,[id]', 'min:3'),
        'img_name' => 'required',
        'category' => 'required',
        'show' => array('required', 'boolean'),
        'description' => array('max:140')

    ];

    protected static $messages = [
      'title.required' => 'El campo "Titulo", es obligatorio.',
      'title.unique' => 'Este Titulo ya existe en otra publicacion.',
      'title.min' => 'El Titulo debe ser mayor a 3 caracteres.',
      'category.required' => 'Tiene que seleccionar una categoria.',
      'description.max' => 'La descripcion de la foto, no puede superar los 140 caracteres.',
      'description.alpha_dash' => 'La descripcion posee caracteres prohividos'

    ];

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    public function collections()
    {
        return $this->belongsToMany('Collection');
    }

    public function categories()
    {
        return $this->belongsToMany('Category');
    }
}