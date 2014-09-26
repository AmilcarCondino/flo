<?php

class Photo extends Model {
	protected $fillable = [];

    protected static $rules = [
        'title' => array('required', 'unique:photos,title', 'alpha_num', 'min:3'),
        'img_name' => 'required',
        'category' => 'required',
        'show' => array('required', 'boolean'),
        'description' => array('max:140', 'alpha_dash')

    ];
}