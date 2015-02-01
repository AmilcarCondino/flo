<?php

class Slider extends Model {
	protected $fillable = [];

    public function captions()
    {
        return $this->hasToMany('Caption');
    }
}