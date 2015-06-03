<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:06 PM
 */

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Validators\ServicioValidator;
use Illuminate\Http\Request;
class ServicioController extends  Controller {

    public  function  index(){
        $servicios = Servicio::all();
        return response()->json($servicios,200);
    }

    public  function  show($id){
        $servicio= Servicio::find($id);
        if(!$servicio){
            return response()->json(['mensaje'=>'Servicio no Encontrado'],404);
        }else{
            return response()->json($servicio,200);
        }
    }

    public  function update($id,request $request){

            $servicio = Servicio::find($id);
            if(!$servicio){
                return  response()->json(['mensaje'=>'Servicio no encontrado'],404);
            }else{
                $validacion =  new  ServicioValidator($request);
                if($validacion->isAccept()){
                $servicio->fill($request->all());
                $servicio->save();
                return response()->json(['mensaje'=>'Servicio actualizado'],201);
            }
                else
                {
                    return response()->json([$validacion->messages()],400);
                }
        }
    }

    public  function  destroy($id){
        try {$servicio = Servicio::find($id);
        if(!$servicio){
            return  response()->json(['mensaje'=>'Servicio no encontrado'],404);
        }
        else{
            $servicio->delete();
            return response()->json(['mensaje'=> 'Servicio eliminado'],201);
        }
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Servicio  no se puede  eliminar '],404);
        }

    }

    public  function  store($id,request $request){
        $validacion =  new  ServicioValidator($request);
        if($validacion->isAccept()){
            $servicio = new Servicio($request->all());
            $servicio->save();
            return response()->json(['mensaje'=>'Servicio Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }
}