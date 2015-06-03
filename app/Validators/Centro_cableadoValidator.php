<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 12:17 AM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class Centro_cableadoValidator extends Validator {

    private   $rules=['nombre'=>'required|string|unique:centro_cableado|max:75',
                    'sigla'=>'required|string|unique:centro_cableado|max:10',
                    'descripcion'=>'required|string|max:200',
                    'ubicacion'=>'required|string|max:200',
                    'edificio_id'=>'required|numeric|exists:edificio,id'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}