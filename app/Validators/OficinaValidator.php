<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 10:49 PM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class OficinaValidator  extends  Validator{

    private  $rules=['nombre'=>'required|string|max:65|unique:oficina',
                    'num_oficina'=>'required|numeric|max:999',
                    'num_extension'=>'required|numeric|max:999',
                    'cant_punto'=>'required|numeric|max:999',
                    'dependencia_id'=>'required|numeric|exist:dependencia,id'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}