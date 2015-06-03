<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 9:22 AM
 */

namespace app\Http\Controllers;


use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController  extends  Controller{

    public  function  login(Request $request){
       $codigo=$request->input('codigo');
       $contrasena= $request->input('contrasena');
       $usuario= Usuario::login($codigo,$contrasena)->first();
        if(!$usuario){
            return  response()->json(['mensaje'=>'Usuario no encontrado'],404);
        }else{
            return response()->json([$usuario], 201);
        }
    }

    public  function  logout(){

    }

    public  function  time_sistema(Request $request){


    }


}