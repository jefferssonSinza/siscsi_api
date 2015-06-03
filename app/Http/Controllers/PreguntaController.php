<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:39 PM
 */

namespace App\Http\Controllers;


use App\Models\Pregunta;
use App\Validators\PreguntaValidator;

class PreguntaController extends  Controller {
    public  function  index(){
        $preguntas = Pregunta::all();
        return response()->json($preguntas,200);
    }

    public  function  show($id){
        $pregunta= Pregunta::find($id);
        if(!$pregunta){
            return response()->json(['mensaje'=>'Pregunta no Encontrado'],404);
        }else{
            return response()->json($pregunta,200);
        }
    }

    public  function update($id,request $request){

        $pregunta = Pregunta::find($id);
        if(!$pregunta){
            return  response()->json(['mensaje'=>'Pregunta no encontrado'],404);
        }else{
            $validacion =  new  PreguntaValidator($request);
            if($validacion->isAccept()){
                $pregunta->fill($request->all());
                $pregunta->save();
                return response()->json(['mensaje'=>'Pregunta actualizado'],201);
            }else
            {
                return response()->json([$validacion->messages()],400);
            }
        }
    }

    public  function  destroy($id){
        try {
            $pregunta = Pregunta::find($id);
            if (!$pregunta) {
                return response()->json(['mensaje' => 'Pregunta no encontrado'], 404);
            } else {
                $pregunta->delete();
                return response()->json(['mensaje' => 'Pregunta eliminado'], 201);
            }
        }
        catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Pregunta  no se puede  eliminar '],404);
        }

    }

    public  function  store(request $request){
        $validacion =  new  PreguntaValidator($request);
        if($validacion->isAccept()){
            $pregunta = new Pregunta($request->all());
            $pregunta->save();
            return response()->json(['mensaje'=>'Pregunta Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

}