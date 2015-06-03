<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 1:36 PM
 */

namespace App\Http\Controllers;


use App\Models\Dependencia;
use App\Validators\DependenciaValidator;
use Illuminate\Http\Request;

class DependenciaController  extends  Controller {


    public function  index()
    {
            $dependencias = Dependencia::all();
            return response()->json($dependencias, 200);
    }

    public function  store(request $request)
    {
            $validacion =  new  DependenciaValidator($request);
            if($validacion->isAccept()) {
                $dependencia = new Dependencia($request->all());
                $dependencia->save();
                return response()->json(['mensaje' => 'Dependencia Registrado'], 201);
            }else {
                return response()->json([$validacion->getMessages()],400);
            }
    }

    public function  destroy($id)
    {
        try {
                $dependencia =Dependencia::find($id);
                if($dependencia){
                    $dependencia->delete();
                    return response()->json(['mensaje'=> 'Dependencia eliminado'],201);
                }else{
                    return response()->json(['mensaje' => 'Dependencia no Encontrado'], 404);
                }
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Dependencia  no se puede  eliminar '],404);
        }

    }

    public function  update($id, request $request)
    {
        $dependencia = Dependencia::find($id);
        if(!$dependencia){
            return  response()->json(['mensaje'=>'Dependencia no encontrado'],404);
        }else{
            $validacion =  new  DependenciaValidator($request);
            if($validacion->isAccept()){
                $dependencia->fill($request->all());
                $dependencia->save();
                return response()->json(['mensaje'=>'Dependencia actualizado'],201);
            }else
            {
                return response()->json([$validacion->getMessages()],400);
            }
        }
    }

    public function  show($id)
    {
            $dependencia = Dependencia::find($id);
            if($dependencia){
                return response()->json($dependencia, 200);
            }else{
                return response()->json(['mensaje' => 'Dependencia no Encontrado'], 404);
            }

    }
}