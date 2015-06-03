<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 1:36 PM
 */

namespace App\Http\Controllers;


use App\Models\Edificio;
use Illuminate\Http\Request;
use App\Validators\EdificioValidator;

class EdificioController  extends  Controller {


    public function  index()
    {
        $edificios= Edificio::all();
        return response()->json($edificios,200);
    }

    public function  store(request $request)
    {
        $validacion =  new  EdificioValidator($request);
        if($validacion->isAccept()){
            $edificio = new Edificio($request->all());
            $edificio->save();
            return response()->json(['mensaje'=>'Edificio Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

    public function  destroy($id)
    {
        try {
            $edificio = Edificio::find($id);
            if(!$edificio){
                return  response()->json(['mensaje'=>'Edificio no encontrado'],404);
            }
            else{
                $edificio->delete();
                return response()->json(['mensaje'=> 'Edificio eliminado'],201);
            }

        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Edificio  no se puede  eliminar '],404);
        }

    }

    public function  update($id, request $request)
    {
        $edificio = Edificio::find($id);
        if(!$edificio){
            return  response()->json(['mensaje'=>'Edificio no encontrado'],404);
        }else{
            $validacion =  new  EdificioValidator($request);
            if($validacion->isAccept()){
                $edificio->fill($request->all());
                $edificio->save();
                return response()->json(['mensaje'=>'Edificio actualizado'],201);
            }else
            {
                return response()->json([$validacion->getMessages()],400);
            }
        }
    }

    public function  show($id)
    {
        $edificio= Edificio::find($id);
        if(!$edificio){
            return response()->json(['mensaje'=>'Edificio no Encontrado'],404);
        }else{
            return response()->json($edificio,200);
        }

    }

    public  function  oficinas($id){
        $edificio= Edificio::find($id);
        if(!$edificio){
            return response()->json(['mensaje'=>'Edificio no Encontrado'],404);
        }else{
            $oficinas=$edificio->oficinas();
            return response()->json($oficinas,200);
        }
    }



}