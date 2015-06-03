<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:40 PM
 */

namespace App\Http\Controllers;


use App\Models\Respuesta;
use App\Validators\RespuestaValidator;

class RespuestaController  extends Controller{
    public  function  index(){
        $respuestas = Respuesta::all();
        return response()->json($respuestas,200);
    }

    public  function  show($id){
        $respuesta= Respuesta::find($id);
        if(!$respuesta){
            return response()->json(['mensaje'=>'Respuesta no Encontrado'],404);
        }else{
            return response()->json($respuesta,200);
        }
    }

    public  function update($id,request $request){

        $respuesta = Respuesta::find($id);
        if(!$respuesta){
            return  response()->json(['mensaje'=>'Respuesta no encontrado'],404);
        }else{
            $validacion =  new  RespuestaValidator($request);
            if($validacion->isAccept()){
                $respuesta->fill($request->all());
                $respuesta->save();
                return response()->json(['mensaje'=>'Respuesta actualizado'],201);
            }else
            {
                return response()->json([$validacion->messages()],400);
            }
        }
    }

    public  function  destroy($id){
        try {
            $respuesta = Respuesta::find($id);
            if (!$respuesta) {
                return response()->json(['mensaje' => 'Respuesta no encontrado'], 404);
            } else {
                $respuesta->delete();
                return response()->json(['mensaje' => 'Respuesta eliminado'], 201);
            }
        }
        catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Respuesta  no se puede  eliminar '],404);
        }

    }

    public  function  store(request $request){
        $validacion =  new  RespuestaValidator($request);
        if($validacion->isAccept()){
            $respuesta = new Respuesta($request->all());
            $respuesta->save();
            return response()->json(['mensaje'=>'Respuesta Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

}