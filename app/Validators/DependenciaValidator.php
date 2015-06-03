<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 10:49 PM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class DependenciaValidator extends  Validator {

    private  $rules=['nombre'=>'required|string|max:|unique:dependencia',
                    'edificio_id'=>'required|numeric|exist:edificio,id'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }

}