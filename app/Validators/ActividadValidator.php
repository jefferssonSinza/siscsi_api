<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:24 AM
 */

namespace App\Validators;


use Illuminate\Http\Request;

class ActividadValidator extends  Validator {

    private  $rules=['nombre'=>'required|string|max:75|unique:actividad',
                    'descripcion'=>'required|string|max:500'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }

}