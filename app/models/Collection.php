<?php

class Collection extends Model {
	protected $fillable = [];

    protected static $rules = [
        'title' => array('required', 'unique:collections,title,[id]', 'min:3')

    ];

    protected static $messages = [
        'title.required' => 'El campo "Titulo", es obligatorio.'


    ];

    public function photos()
    {
        return $this->belongsToMany('Photo');
    }

}