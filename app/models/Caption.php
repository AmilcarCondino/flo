<?php

class Caption extends \Eloquent {
	protected $fillable = [];

    public function sliders()
    {
        return $this->belongsToMany('Slider');
    }

}