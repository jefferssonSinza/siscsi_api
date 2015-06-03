<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:13 PM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class ServicioValidator extends  Validator {

    private   $rules=['nombre'=>'required|string|max:150|unique:servicio',
                    'descripcion'=>'required|max:120|unique:descripcion'];


    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}