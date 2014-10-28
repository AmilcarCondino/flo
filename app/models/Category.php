<?php

class Category extends \Eloquent {
	protected $fillable = [];



    protected static $rules = [
        'title' => array('required', 'unique:categories,title,[id]', 'min:3')

    ];

    protected static $messages = [
        'title.required' => 'El campo "Titulo", es obligatorio.'


    ];

    public function tags()
    {
        return $this->belongsToMany('Photo');
    }
}