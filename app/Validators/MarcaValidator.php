<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:17 PM
 */

namespace App\Validators;

use Illuminate\Http\Request;
class MarcaValidator extends Validator {

    private   $rules=['nombre'=>'required|string|max:150|unique:marca'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}