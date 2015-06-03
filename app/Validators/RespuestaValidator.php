<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:43 PM
 */

namespace App\Validators;


class RespuestaValidator  extends  Validator{

    private   $rules=['respuesta'=>'required|string',
                        'pregunta_id'=>'required|numeric|exist:pregunta,id'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}