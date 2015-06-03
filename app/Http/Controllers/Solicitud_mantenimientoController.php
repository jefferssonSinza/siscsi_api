<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:35 PM
 */

namespace App\Http\Controllers;


use App\Models\Solicitud_mantenimiento;
use App\Validators\Solicitud_MantenimientoValidator;

class Solicitud_mantenimientoController extends Controller {

    public  function  index(){
        $solitud_mants = Solicitud_mantenimiento::all();
        return response()->json($solitud_mants,200);
    }

    public  function  show($id){
        $solitud_mant= Solicitud_mantenimiento::find($id);
        if(!$solitud_mant){
            return response()->json(['mensaje'=>'Solicitud de mantenimiento  no Encontrado'],404);
        }else{
            return response()->json($solitud_mant,200);
        }
    }

    public  function update($id,request $request){

        $solitud_mant = Solicitud_mantenimiento::find($id);
        if(!$solitud_mant){
            return  response()->json(['mensaje'=>'Solicitud de mantenimiento no encontrado'],404);
        }else{
            $validacion =  new  Solicitud_MantenimientoValidator($request);
            if($validacion->isAccept()){
                $solitud_mant->fill($request->all());
                $solitud_mant->save();
                return response()->json(['mensaje'=>'Solicitud de mantenimiento actualizado'],201);
            }else
            {
                return response()->json([$validacion->messages()],400);
            }
        }
    }

    public  function  destroy($id){
        try {
            $solitud_mant = Solicitud_mantenimiento::find($id);
            if (!$solitud_mant) {
                return response()->json(['mensaje' => 'Solicitud de mantenimiento no encontrado'], 404);
            } else {
                $solitud_mant->delete();
                return response()->json(['mensaje' => 'Solicitud de mantenimiento eliminado'], 201);
            }
        }
        catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Solicitud de mantenimiento  no se puede  eliminar '],404);
        }

    }

    public  function  store(request $request){
        $validacion =  new  Solicitud_MantenimientoValidator($request);
        if($validacion->isAccept()){
            $solitud_mant = new Solicitud_mantenimiento($request->all());
            $solitud_mant->save();
            return response()->json(['mensaje'=>'Solicitud de mantenimiento Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }
}