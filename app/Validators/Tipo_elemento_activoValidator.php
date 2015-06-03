<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 4:28 PM
 */

namespace app\Validators;

use Illuminate\Http\Request;
class Tipo_elemento_activoValidator  extends  Validator{

    private   $rules=['nombre'=>'required|unique:tipo-elemento-activo|string|max:150'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}