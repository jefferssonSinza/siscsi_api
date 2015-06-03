<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:26 PM
 */

namespace App\Http\Controllers;


use App\Models\Anomalia;
use App\Validators\AnomaliaValidator;

class AnomaliaController extends Controller {

    public  function  index(){
        $anomalias = Anomalia::all();
        return response()->json($anomalias,200);
    }

    public  function  show($id){
        $anomalia= Anomalia::find($id);
        if(!$anomalia){
            return response()->json(['mensaje'=>'Anomalia no Encontrado'],404);
        }else{
            return response()->json($anomalia,200);
        }
    }

    public  function update($id,request $request){
        $anomalia = Anomalia::find($id);
        if(!$anomalia){
            return  response()->json(['mensaje'=>'Anomalia no encontrado'],404);
        }else{
            $validacion =  new  AnomaliaValidator($request);
            if($validacion->isAccept()){
                $anomalia->fill($request->all());
                $anomalia->save();
                return response()->json(['mensaje'=>'Anomalia actualizado'],201);
            }else
            {
                return response()->json([$validacion->messages()],400);
            }
        }
    }

    public  function  destroy($id){
        try {
            $anomalia = Anomalia::find($id);
            if(!$anomalia){
                return  response()->json(['mensaje'=>'Anomalia no encontrado'],404);
            }
            else{
                $anomalia->delete();
                return response()->json(['mensaje'=> 'Anomalia eliminado'],201);
            }
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Anomalia  no se puede  eliminar '],404);
        }

    }

    public  function  store(request $request){
        $validacion =  new  AnomaliaValidator($request);
        if($validacion->isAccept()){
            $anomalia = new Anomalia($request->all());
            $anomalia->save();
            return response()->json(['mensaje'=>'Anomalia Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }
}