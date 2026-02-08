<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{


    protected $errors = [];


    /**
     * Construct
     */
    public function __construct(public array $attributes)
    {


        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a password';
        }
    }



    /**
     * Validate
     */
    public static function validate($attributes)
    {

        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }


    /**
     * Throw
     */
    public function throw()
    {
        ValidationException::throw($this->errors, $this->attributes);
    }



    /**
     * Failed
     */
    public function failed()
    {
        return count($this->errors);
    }



    /**
     * Errors
     */
    public function errors()
    {
        return $this->errors;
    }


    /**
     * Error
     */
    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
