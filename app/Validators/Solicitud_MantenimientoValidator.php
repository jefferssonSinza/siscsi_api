<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:32 PM
 */

namespace App\Validators;


class Solicitud_MantenimientoValidator  extends Validator {
    private   $rules=['fecha'=>'required|date|date_format:Y-m-d',
        'oficina_id'=>'required|numeric|exist:oficina,id',
        'observacion'=>'string',
        'estado'=>'required|numeric|max:3'];


    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}
