<?php

class Category extends Model {
	protected $fillable = [];



    protected static $rules = [
        'title' => array('required', 'unique:categories,title,[id]', 'min:3')

    ];

    protected static $messages = [
        'title.required' => 'El campo "Titulo", es obligatorio.'


    ];

    public function photos()
    {
        return $this->belongsToMany('Photo');
    }
}