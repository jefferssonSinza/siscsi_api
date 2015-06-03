<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 1:12 PM
 */

namespace app\Validators;


class Beca_trabajoValidator  extends  Validator
{

    private $rules = ['usuario_id' => 'required|numeric|exist:usuario,id',
                     'semestre_id' => 'required|numeric|exits:semestre,id'
    ];

    function __construct(request $request)
    {
        parent::__construct($this->rules, $request);
    }
}