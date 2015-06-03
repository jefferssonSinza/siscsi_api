<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 19/05/2015
 * Time: 9:51
 */

namespace App\Validators;


use Illuminate\Http\Request;


class UsuarioValidator  extends  Validator
{
    private   $rules=['codigo'=>'required|numeric|unique:usuario|max:9999999999',
                     'documento_identidad'=>'required|numeric|unique:usuario|max:9999999999',
                     'nombre'=>'required|string|max:65',
                     'apellido'=>'required|string|max:65',
                     'correo_electronico'=>'required|email|unique:usuario|max:200',
                    'contrasena'=>'required',
                    'tipo_usuario'=>'required|integer|between:0,2'];


    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }



}