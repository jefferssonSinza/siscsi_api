<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 12:13 AM
 */

namespace app\Http\Controllers;


use App\Models\Centro_cableado;
use App\Validators\Centro_cableadoValidator;

class Centro_cableadoController extends  Controller {
    public function  index()
    {
        $centro_cableados= Centro_cableado::all();
        return response()->json($centro_cableados,200);
    }

    public function  store(request $request)
    {
        $validacion =  new  Centro_cableadoValidator($request);
        if($validacion->isAccept()){
            $centro_cableado = new Centro_cableado($request->all());
            $centro_cableado->save();
            return response()->json(['mensaje'=>'Centro cableado Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

    public function  destroy($id)
    {
        try {
            $centro_cableado = Centro_cableado::find($id);
            if(!$centro_cableado){
                return  response()->json(['mensaje'=>'Centro cableado no encontrado'],404);
            }
            else{
                $centro_cableado->delete();
                return response()->json(['mensaje'=> 'Centro cableado eliminado'],201);
            }
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Centro cableado no se puede  eliminar '],404);
        }

    }

    public function  update($id,request $request)
    {
            $centro_cableado = Centro_cableado::find($id);
            if(!$centro_cableado){
                return  response()->json(['mensaje'=>'Centro cableado no encontrado'],404);
            }else{
                $validacion =  new  HostValidator($request);
                if($validacion->isAccept()){
                $centro_cableado->fill($request->all());
                $centro_cableado->save();
                return response()->json(['mensaje'=>'Centro cableado actualizado'],201);
            }else
                {
                    return response()->json([$validacion->messages()],400);
                }
        }
    }

    public function  show($id)
    {
        $centro_cableado= Centro_cableado::find($id);
        if(!$centro_cableado){
            return response()->json(['mensaje'=>'Centro cableado no Encontrado'],404);
        }else{
            return response()->json($centro_cableado,200);
        }
    }


}