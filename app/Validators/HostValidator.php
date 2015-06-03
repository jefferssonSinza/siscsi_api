<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 12:04 AM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class HostValidator  extends  Validator{
    private   $rules=['hostname'=>'required|string|max:120',
                    'direccion_ipv4'=>'required|ip',
                    'mascara_ipv4'=>'required|ip',
                    'direccion_ipv6'=>'required|ip',
                    'mascara_ipv6'=>'required|ip',
                    'inventario_ufps'=>'required|string|max:40',
                    'marca_nic'=>'required|string|max:120',
                    'mac'=>'required|string|max:12',
                    'grupo_trabajo'=>'string',
                    'dominio'=>'string',
                    'vlan_id'=>'required|numeric|exists:vlan,id',
                    'punto_id'=>'required|numeric|exists:punto,id',
                    'oficina_id'=>'required|numeric|exists:oficina,id'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}