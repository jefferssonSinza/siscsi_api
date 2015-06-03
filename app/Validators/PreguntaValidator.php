<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:42 PM
 */

namespace App\Validators;


class PreguntaValidator extends Validator {

    private   $rules=['pregunta'=>'required|string|unique:pregunta'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}