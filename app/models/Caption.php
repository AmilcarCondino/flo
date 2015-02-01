<?php

class Caption extends Model {
	protected $fillable = [];

    public function sliders()
    {
        return $this->belongsToMany('Slider');
    }

    public function parent()
    {
        return $this->belongsTo('Caption', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Caption', 'parent_id');
    }

}