<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:58 PM
 */

namespace app\Http\Controllers;


use App\Models\Categoria_cable;
use app\Validators\Categoria_cableValidator;

class Categoria_cableController extends  Controller {

    public  function  index(){
        $categorias_cable = Categoria_cable::all();
        return response()->json($categorias_cable,200);
    }

    public  function  show($id){
        $categoria_cable= Categoria_cable::find($id);
        if(!$categoria_cable){
            return response()->json(['mensaje'=>'Categoria no Encontrado'],404);
        }else{
            return response()->json($categoria_cable,200);
        }
    }

    public  function update($id,request $request){
        $categoria_cable = Categoria_cable::find($id);
        if(!$categoria_cable){
            return  response()->json(['mensaje'=>'Categoria cable  no encontrado'],404);
        }else{
            $validacion =  new  Categoria_cableValidator($request);
            if($validacion->isAccept()){
                $categoria_cable->fill($request->all());
                $categoria_cable->save();
                return response()->json(['mensaje'=>'Categoria cable  actualizado'],201);
            }else
            {
                return response()->json([$validacion->messages()],400);
            }

        }

    }

    public  function  destroy($id){
        try {
            $categoria_cable = Categoria_cable::find($id);
            if(!$categoria_cable){
                return  response()->json(['mensaje'=>'Categoria cable no encontrado'],404);
            }
            else{
                $categoria_cable->delete();
                return response()->json(['mensaje'=> 'Categoria cable  eliminado'],201);
            }
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Categoria cable  no se puede  eliminar '],404);
        }

    }

    public  function  store($id,request $request){
        $validacion =  new  Categoria_cableValidator($request);
        if($validacion->isAccept()){
            $categoria_cable = new Categoria_cable($request->all());
            $categoria_cable->save();
            return response()->json(['mensaje'=>'Categoria cable  Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }
}