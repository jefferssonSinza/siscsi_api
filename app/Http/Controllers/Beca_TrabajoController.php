<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 10:22 AM
 */

namespace App\Http\Controllers;


use App\Models\Beca_trabajo;
use App\Models\Semestre;
use Symfony\Component\HttpKernel\Tests\Controller;

class Beca_TrabajoController extends  Controller {

    public  function  index($id){
        $beca_Trabajos= Beca_trabajo::all();
        return response()->json($beca_Trabajos,200);
    }
    public  function  show($id)
    {
        $beca= Beca_trabajo::find($id);
        if(!$beca){
            return response()->json(['mensaje'=>'Beca Trabajo no Encontrado'],404);
        }else{
            return response()->json($beca,200);
        }
    }

    public  function  destroy($id){
        try {
            $beca= Beca_trabajo::find($id);
            if(!$beca){
                return  response()->json(['mensaje'=>'Beca Trabajo no encontrado'],404);
            }
            else{
                $beca->delete();
                return response()->json(['mensaje'=> 'Beca Trabajo eliminado'],201);
            }
        }catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Beca Trabajo no se puede  eliminar '],404);
        }

    }

    public  function  store($id,request $request){
        $validacion =  new  Beca_trabajoValidator($request);
        if($validacion->isAccept()){
            $beca = new Beca_trabajo($request->all());
            $beca->save();
            return response()->json(['mensaje'=>'Beca Trabajo Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }
}