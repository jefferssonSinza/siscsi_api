<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 12:29 AM
 */

namespace App\Http\Controllers;


use App\Models\Rack;
use App\Validators\RackValidator;

class RackController extends Controller {

    public function  index()
    {
        $racks= Rack::all();
        return response()->json($racks,200);
    }

    public function  store(request $request)
    {
        $validacion = new RackValidator($request);
        if($validacion->isAccept()){
            $rack = new Rack($request->all());
            $rack->save();
            return response()->json(['mensaje'=>'Rack Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

    public function  destroy($id)
    {
        try{
        $rack = Rack::find($id);
        if(!$rack){
            return  response()->json(['mensaje'=>'Rack no encontrado'],404);
        }
        else{
            $rack->delete();
            return response()->json(['mensaje'=> 'Rack eliminado'],201);
        }}
    catch (\Illuminate\Database\QueryException $e){
        return response()->json(['mensaje'=> 'Rack  no se puede  eliminar '],404);
    }

    }

    public function  update($id, request $request)
    {

            $rack = Rack::find($id);
            if(!$rack){
                return  response()->json(['mensaje'=>'Rack no encontrado'],404);
            }else{
                $validacion = new RackValidator($request);
                if($validacion->isAccept()){
                $rack->fill($request->all());
                $rack->save();
                return response()->json(['mensaje'=>'Rack actualizado'],201);
            }
                else
                {
                    return response()->json([$validacion->getMessages()],400);
                }
        }
    }

    public function  show($id)
    {
        $rack= Rack::find($id);
        if(!$rack){
            return response()->json(['mensaje'=>'Rack no Encontrado'],404);
        }else{
            return response()->json($rack,200);
        }
    }
}