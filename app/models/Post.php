<?php

class Post extends Model {
	protected $fillable = [];

    protected static $rules = [
        'title' => array('required', 'unique:posts,title', 'alpha_num', 'min:2', 'max:30'),
        'body' => array('min:150', 'required', 'alpha_dash')

    ];

}