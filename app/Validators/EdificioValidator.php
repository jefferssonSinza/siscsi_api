<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 10:49 PM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class EdificioValidator  extends  Validator{

    private  $rules=['nombre'=>'required|string|max:85|unique:edificio',
                    'sigla'=>'required|string|max:3|unique:edificio'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}