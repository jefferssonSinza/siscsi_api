<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 8:45 AM
 */

namespace App\Http\Controllers;


use App\Models\Elemento_activo;
use App\Validators\Elemento_activoValidator;

class Elemento_activoController extends  Controller
{
    public function  index()
    {
        $elementos_activo = Elemento_activo::all();
        return response()->json($elementos_activo, 200);
    }

    public function  store(request $request)
    {
        $validacion = new Elemento_activoValidator($request);
        if ($validacion->isAccept()) {
            $elemento_activo = new Elemento_activo($request->all());
            $elemento_activo->save();
            return response()->json(['mensaje' => 'Elemento activo Registrado','id'=>$elemento_activo->id], 201);
        } else {
            return response()->json([$validacion->getMessages()], 400);
        }
    }

    public function  destroy($id)
    {
        try {
            $elemento_activo = Elemento_activo::find($id);
            if (!$elemento_activo) {
                return response()->json(['mensaje' => 'Elemento activo no encontrado'], 404);
            } else {
                $elemento_activo->delete();
                return response()->json(['mensaje' => 'Elemento activo eliminado'], 201);
            }
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Elemento  no se puede  eliminar '],404);
        }

    }

    public function  update($id, request $request)
    {
        $elemento_activo = Elemento_activo::find($id);
        if (!$elemento_activo) {
            return response()->json(['mensaje' => 'Elemento activo no encontrado'], 404);
        } else {
            $validacion = new Elemento_activoValidator($request);
            if ($validacion->isAccept()) {
                $elemento_activo->fill($request->all());
                $elemento_activo->save();
                return response()->json(['mensaje' => 'Elemento activo actualizado','id'=>$elemento_activo->id], 201);

            } else {
                return response()->json([$validacion->getMessages()], 400);
            }
           }

    }

    public function  show($id)
    {
        $elemento_activo = Elemento_activo::find($id);
        if (!$elemento_activo) {
            return response()->json(['mensaje' => 'Elemento activo no Encontrado'], 404);
        } else {
            return response()->json($elemento_activo, 200);
        }
    }
}