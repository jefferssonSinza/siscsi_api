<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 10:03 AM
 */

namespace App\Http\Controllers;


use App\Models\Actividad;
use App\Validators\ActividadValidator;
use Illuminate\Http\Request;

class ActividadController extends  Controller {

    public function  index()
    {
        $actividades= Actividad::all();
        return response()->json($actividades,200);
    }

    public function  store(request $request)
    {
        $validacion =  new  ActividadValidator($request);
        if($validacion->isAccept()){
            $actividad = new Actividad($request->all());
            $actividad->save();
            return response()->json(['mensaje'=>'Actividad Registrado','id'=>$actividad->id], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

    public function  destroy($id)
    {
        try {
            $actividad = Actividad::find($id);
            if(!$actividad){
                return  response()->json(['mensaje'=>'Actividad no encontrado'],404);
            }
            else{
                $actividad->delete();
                return response()->json(['mensaje'=> 'Actividad eliminado'],201);
            }
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Actividad  no se puede  eliminar '],404);
        }

    }

    public function  update($id, request $request)
    {   $actividad = Actividad::find($id);
        if(!$actividad){
            return  response()->json(['mensaje'=>'Actividad no encontrado'],404);
        }else {
            $validacion =  new  ActividadValidator($request);
            if ($validacion->isAccept()) {
                $actividad->fill($request->all());
                $actividad->save();
                return response()->json(['mensaje' => 'Actividad actualizado', 'id' => $actividad->id], 201);
            }else{
                return response()->json([$validacion->getMessages()],400);
            }
        }

    }

    public function  show($id)
    {
        $actividad= Actividad::find($id);
        if(!$actividad){
            return response()->json(['mensaje'=>'Actividad no Encontrado'],404);
        }else{
            return response()->json($actividad,200);
        }
    }
}