<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:37 PM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class VlanValidator  extends  Validator{
private   $rules=['nombre'=>'required|string|max:40',
                'ipv4_inicial'=>'required|ip|max:40',
                'ipv4_final'=>'required|ip|max:40',
                'mascara_ipv4'=>'required|ip|max:40',
                'ipv6_inicio'=>'required|ip|max:120',
                'ipv6_final'=>'required|ip|max:120',
                'mascara_ipv6'=>'required|ip|max:120'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}