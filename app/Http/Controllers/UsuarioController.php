<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Validators\UsuarioValidator;
use Illuminate\Http\Request;

class UsuarioController extends  Controller {

    public function  index()
    {
        $Usuarios= Usuario::all();
        return response()->json($Usuarios,200);
    }

    public function  store(request $request)
    {
        $validacion =  new  UsuarioValidator($request);
        if($validacion->isAccept()){
            $usuario = new Usuario($request->all());
            $usuario->save();
            return response()->json(['mensaje'=>'Usuario Registrado','id'=>$usuario->id], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }
    public function  destroy($id)
    {try{
        $usuario = Usuario::find($id);
        if(!$usuario){
            return  response()->json(['mensaje'=>'usuario no encontrado'],404);
        }
        else{
            $usuario->delete();
            return response()->json(['mensaje'=> 'Usuario eliminado'],201);
        }
    }catch (\Illuminate\Database\QueryException $e){
        return response()->json(['mensaje'=> 'Usuario  no se puede  eliminar '],201);
    }
    }

    public function  update($id,request $request)
    {  $usuario = Usuario::find($id);
        if(!$usuario){
            return  response()->json(['mensaje'=>'Usuario no encontrado'],404);
        }else{
            $validacion = new UsuarioValidator($request);
            if($validacion->isAccept()){
                $usuario->fill($request->all());
                $usuario->save();
                return response()->json(['mensaje'=>'Usuario actualizado'],201);
            }else
            {
                return response()->json([$validacion->getMessages()],400);
            }
        }
    }
    public function  show($id)
    {
    $usuario= Usuario::find($id);
        if(!$usuario){
            return response()->json(['mensaje'=>'Usuario no Encontrado'],404);
        }else{
            return response()->json($usuario,200);
        }
    }






}