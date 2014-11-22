<?php namespace Way\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Validation\Validator;

class Model extends Eloquent {

    /**
     * Error message bag
     * 
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Validation rules
     * 
     * @var Array
     */
    protected static $rules = array();

    /**
     * Custom messages
     * 
     * @var Array
     */
    protected static $messages = array();

    /**
     * Validator instance
     * 
     * @var Illuminate\Validation\Validators
     */
    protected $validator;

    public function __construct(array $attributes = array(), Validator $validator = null)
    {
        parent::__construct($attributes);

        $this->validator = $validator ?: \App::make('validator');
    }

    /**
     * Listen for save event
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function($model)
        {
            return $model->validate();
        });
    }

    /**
     * Validates current attributes against rules
     */
    public function validate()
    {

        $replace = ($this->getKey() > 0) ? $this->getKey() : '';
        foreach (static::$rules as $key => $rule)
        {
            static::$rules[$key] = str_replace('[id]', $replace, $rule);
        }

        $v = $this->validator->make($this->attributes, static::$rules, static::$messages);

        if ($v->passes())
        {
            return true;
        }

        $this->setErrors($v->messages());

        return false;
    }

    /**
     * Set error message bag
     * 
     * @var Illuminate\Support\MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Inverse of wasSaved
     */
    public function hasErrors()
    {
        return ! empty($this->errors);
    }


    /**
     * Validate only one field of a form
     */
    public  function validateOneField($nameAttribute, $valueAttribute)
    {


//        $replace = ($this->getKey() > 0) ? $this->getKey() : '';
//        foreach (static::$rules as $key => $rule)
//        {
//            static::$rules[$key] = str_replace('[id]', $replace, $rule);
//        }
        //array('title' => array('required', 'unique', 'min:3'))



        $v = $this->validator->make( array($nameAttribute => $valueAttribute),
                                     array($nameAttribute => static::$rules[$nameAttribute]),
                                     static::$messages);


            if ($v->fails()){
                $bar =  $v->messages();
            }

        if ($v->passes())
        {
            return true;
        } else {

            $this->setErrors($v->messages());

            return redire
        }
    }
}
