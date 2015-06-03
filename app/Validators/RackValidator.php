<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 12:25 AM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class RackValidator extends  Validator {

    private   $rules=['serial'=>'required|string|unique:rack|max:120',
                    'sigla'=>'required|string|max:10|unique:rack',
                    'inventario_ufps'=>'required|string|max:120|unique:rack',
                    'centro_cableado_id'=>'required|exists:centro-cableado,id',
                    'marca_id'=>'required|numeric|exists:marca,id'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}