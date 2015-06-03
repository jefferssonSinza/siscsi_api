<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 2:51 PM
 */

namespace App\Validators;


use Illuminate\Support\Facades\Validator;

class Servicio_ofrecidoValidator  extends  Validator{
    private   $rules=['fecha'=>'required|date_format:Y-m-d',
                        'sugerencia'=>'max:120',
                        'inv_pc'=>'string|max:15',
                        'estado'=>'required|numeric|max:3',
                        'calificacion'=>'numeric|max:5',
                        'solicitud-mantenimiento'=>'required|numeric|exist:solicitud-mantenimiento,id'];


    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}