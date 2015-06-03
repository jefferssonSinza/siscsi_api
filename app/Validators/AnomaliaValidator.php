<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:29 PM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class AnomaliaValidator extends  Validator {

    private   $rules=['nombre'=>'required|string|max:150|unique:anomalia',
                    'descripcion'=>'required|string|max:120'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}