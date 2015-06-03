<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:56 PM
 */

namespace app\Validators;

use Illuminate\Http\Request;
class Categoria_cableValidator extends Validator  {

    private   $rules=['nombre'=>'required|string|max:45|unique:categoria_cable'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}