<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 4:35 PM
 */

namespace App\Http\Controllers;


use App\Models\Tipo_elemento_activo;
use app\Validators\Tipo_elemento_activoValidator;

class Tipo_elemento_activoController extends  Controller{

    public function  index()
    {
        $tipo_elementos_activos= Tipo_elemento_activo::all();
        return response()->json($tipo_elementos_activos,200);
    }
    public function  store(request $request)
    {
        $validacion =  new  Tipo_elemento_activoValidator($request);
        if($validacion->isAccept()){
            $tipo_elemento_activo = new Tipo_elemento_activo($request->all());
            $tipo_elemento_activo->save();
            return response()->json(['mensaje'=>'tipo elemento activo  Registrado','id'=>$tipo_elemento_activo->id], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

    public function  destroy($id)
    {
        try{
            $tipo_elemento_activo = Tipo_elemento_activo::find($id);
        if(!$tipo_elemento_activo){
            return  response()->json(['mensaje'=>'tipo elemento activo no encontrado'],404);
        }
        else{
            $tipo_elemento_activo->delete();
            return response()->json(['mensaje'=> 'tipo elemento activo eliminado'],201);
        }
    }catch (\Illuminate\Database\QueryException $e){
        return response()->json(['mensaje'=> 'tipo elemento activo  no se puede  eliminar '],201);
    }
    }

    public function  update($id,request $request)
    {  $tipo_elemento_activo = Tipo_elemento_activo::find($id);
        if(!$tipo_elemento_activo){
            return  response()->json(['mensaje'=>'tipo elemento activo no encontrado'],404);
        }else{
            $validacion = new Tipo_elemento_activoValidator($request);
            if($validacion->isAccept()){
                $tipo_elemento_activo->fill($request->all());
                $tipo_elemento_activo->save();
                return response()->json(['mensaje'=>'tipo elemento activo actualizado'],201);
            }else
            {
                return response()->json([$validacion->getMessages()],400);
            }
        }
    }
    public function  show($id)
    {
        $tipo_elemento_activo= Tipo_elemento_activo::find($id);
        if(!$tipo_elemento_activo){
            return response()->json(['mensaje'=>'tipo elemento activo no Encontrado'],404);
        }else{
            return response()->json($tipo_elemento_activo,200);
        }
    }


}