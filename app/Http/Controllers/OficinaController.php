<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 1:37 PM
 */

namespace App\Http\Controllers;


use App\Models\Dependencia;
use App\Models\Edificio;
use App\Models\Oficina;
use Illuminate\Http\Request;

class OficinaController  extends  Controller
{
    public function  index()
    {
                $oficinas = Oficina::all();
                return response()->json($oficinas, 200);

    }

    public function  store(request $request)
    {
        $validacion = new  OficinaValidator($request);
        if ($validacion->isAccept()) {
            $oficina = new Oficina($request->all());
            $oficina->save();
            return response()->json(['mensaje' => 'Oficina Registrado'], 201);
        } else {
            return response()->json([$validacion->getMessages()], 400);
        }
    }

    public function  update($id, request $request)
    {
        $oficina = Oficina::find($id);
        if (!$oficina) {
            return response()->json(['mensaje' => 'Oficina no encontrado'], 404);
        } else {
            $validacion = new  OficinaValidator($request);
            if ($validacion->isAccept()) {
                $oficina->fill($request->all());
                $oficina->save();
                return response()->json(['mensaje' => 'Oficina actualizado'], 201);
            } else {
                return response()->json([$validacion->messages()], 400);
            }
        }
    }

    public function  show($id)
    {
        $oficina = Oficina::find($id);
        if (!$oficina) {
            return response()->json(['mensaje' => 'Oficina no Encontrado'], 404);
        } else {
            return response()->json($oficina, 200);
        }
    }


    public function  destroy($id)
    {
        try {
            $oficina = Oficina::find($id);
            if (!$oficina) {
                return response()->json(['mensaje' => 'Oficina no Encontrado'], 404);
            } else {
                $oficina->delete();
                return response()->json(['mensaje' => 'Oficina eliminado'], 201);
            }

        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['mensaje' => 'Oficina  no se puede  eliminar '], 404);
        }


    }

}