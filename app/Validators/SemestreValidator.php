<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 10:20 AM
 */

namespace App\Validators;


use Illuminate\Http\Request;

class SemestreValidator  extends   Validator{

    private  $rules=['nombre'=>'required|string|max:75|unique:semestre',
                    'inicio_semestre'=>'required|date|different:fin_semestre|unique:semestre|date_format:Y-m-d',
                    'fin_semestre'=>'required|date|different:inicio_semestre|after:inicio_semestre|unique:semestre|date_format:Y-m-d'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}