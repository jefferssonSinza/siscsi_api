<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 9:08 AM
 */

namespace App\Http\Controllers;




use App\Models\Panel;
use App\Validators\PanelValidator;

class PanelController  extends  Controller{
    public  function  index(){
        $paneles = Panel::all();
        return response()->json($paneles,200);
    }

    public  function  show($id){
        $panel= Panel::find($id);
        if(!$panel){
            return response()->json(['mensaje'=>'Panel no Encontrado'],404);
        }else{
            return response()->json($panel,200);
        }
    }

    public  function update($id,request $request){

            $panel = Panel::find($id);
            if(!$panel){
                return  response()->json(['mensaje'=>'Panel no encontrado'],404);
            }else{
                $validacion =  new  PanelValidator($request);
                if($validacion->isAccept()){
                $panel->fill($request->all());
                $panel->save();
                return response()->json(['mensaje'=>'Panel actualizado'],201);
            }else
                {
                    return response()->json([$validacion->messages()],400);
                }
        }
    }

    public  function  destroy($id){
        try {
            $panel = Panel::find($id);
            if (!$panel) {
                return response()->json(['mensaje' => 'Panel no encontrado'], 404);
            } else {
                $panel->delete();
                return response()->json(['mensaje' => 'Panel eliminado'], 201);
            }
        }
    catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Panel  no se puede  eliminar '],404);
        }

    }

    public  function  store(request $request){
        $validacion =  new  PanelValidator($request);
        if($validacion->isAccept()){
            $panel = new Panel($request->all());
            $panel->save();
            return response()->json(['mensaje'=>'Panel Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

}