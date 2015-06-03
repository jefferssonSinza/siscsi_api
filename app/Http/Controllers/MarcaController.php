<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:22 PM
 */

namespace App\Http\Controllers;



use App\Models\Marca;
use App\Validators\MarcaValidator;

class MarcaController  extends  Controller{

    public  function  index(){
        $marcas = Marca::all();
        return response()->json($marcas,200);
    }

    public  function  show($id){
        $marca= Marca::find($id);
        if(!$marca){
            return response()->json(['mensaje'=>'Marca no Encontrado'],404);
        }else{
            return response()->json($marca,200);
        }
    }

    public  function update($id,request $request){

            $marca = Marca::find($id);
            if(!$marca){
                return  response()->json(['mensaje'=>'Marca no encontrado'],404);
            }else{
                $validacion =  new  MarcaValidator($request);
                if($validacion->isAccept()){
                $marca->fill($request->all());
                $marca->save();
                return response()->json(['mensaje'=>'Marca actualizado'],201);
            }else
                {
                    return response()->json([$validacion->messages()],400);
                }
        }
    }

    public  function  destroy($id){
        try {
            $marca = Marca::find($id);
            if (!$marca) {
                return response()->json(['mensaje' => 'Marca no encontrado'], 404);
            } else {
                $marca->delete();
                return response()->json(['mensaje' => 'Marca eliminado'], 201);
            }
        }
    catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Marca  no se puede  eliminar '],404);
        }


    }

    public  function  store($id,request $request){
        $validacion =  new  MarcaValidator($request);
        if($validacion->isAccept()){
            $marca = new Marca($request->all());
            $marca->save();
            return response()->json(['mensaje'=>'Marca Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }
}