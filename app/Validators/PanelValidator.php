<?php


namespace App\Validators;

use Illuminate\Http\Request;
class PanelValidator extends  Validator {

    private   $rules=['nombre'=>'',
                    'sigla'=>'required|string|max:10|unique:panel',
                    'modelo'=>'required|string|max:45',
                    'serial'=>'required|string|max:40',
                    'inventario_ufps'=>'required|string|max:40',
                    'tipo_panel'=>'required|string|max:60',
                    'cant_punto'=>'required|numeric|max:2',
                    'categoria_cable_id'=>'required|numeric|exists:categoria-cable,id',
                     'rack_id'=>'required|numeric|exists:rack,id'];

    function __construct(request $request)
    {
        parent::__construct($this->rules,$request);
    }
}