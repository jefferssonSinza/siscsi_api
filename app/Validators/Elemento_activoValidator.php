<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 8:45 AM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class Elemento_activoValidator extends  Validator {

    private   $rules=['serial'=>'required|unique:elemento-activo|string|max:120',
                    'inventario_ufps'=>'required|string|max:120',
                    'cant_interfaz'=>'required|numeric|max:99',
                    'tipo-elemento-activo_id'=>'exists:tipo-elemento-activo,id',
                    'rack_id'=>'required|numeric|exists:rack,id'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}