<?php

class Slider extends Model {
	protected $fillable = [];

    public function captions()
    {
        return $this->belongsToMany('Caption');
    }
}