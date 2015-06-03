<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 9:36 AM
 */

namespace App\Http\Controllers;


use App\Models\Semestre;
use App\Validators\SemestreValidator;
use Illuminate\Http\Request;

class SemestreController extends  Controller   {


    public function  index()
    {
        $semestres= Semestre::all();
        return response()->json($semestres,200);
    }

    public function  store(request $request)
    {
        $semestre_activo = Semestre::SemestreActivo();;
       if(!$semestre_activo){
        $validacion = new SemestreValidator($request);
        if($validacion->isAccept()){
            $semestre = new Semestre($request->all());
            $semestre->save();
            return response()->json(['mensaje'=>'Semestre Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
       }else{
           return response()->json(['mensaje'=>'Hay Semestre Activo'],400);
       }
    }

    public function  destroy($id)
    {  try{
        $semestre = Semestre::find($id);
        if(!$semestre){
            return  response()->json(['mensaje'=>'Semestre no encontrado'],404);
        }
        else{
                $semestre->activo = '0';
                $semestre->save();
                return response()->json(['mensaje'=> 'Semestre desactivado'],201);
        }}
    catch (\Illuminate\Database\QueryException $e){
        return response()->json(['mensaje'=> 'Semestre  no se puede  eliminar '],404);
    }

    }

    public function  update($id, request $request)
    {
        $semestre = Semestre::find($id);
        if(!$semestre){
            return  response()->json(['mensaje'=>'Semestre no encontrado'],404);
        }else {
            if ($semestre->activo == 0){
                return response()->json(['mensaje'=>' Semestre  no se encuentra activo'],400);
            } else {
                $validacion = new SemestreValidator($request);
                if ($validacion->isAccept()) {
                    $semestre->fill($request->all());
                    $semestre->save();
                    return response()->json(['mensaje' => 'Semestre actualizado'], 201);
                } else {
                    return response()->json([$validacion->getMessages()], 400);
                }
            }
        }
    }


    public function  show($id)
    {
        $semestre= Semestre::find($id);
        if(!$semestre){
            return response()->json(['mensaje'=>'Semestre no Encontrado'],404);
        }else{
            return response()->json($semestre,200);
        }
    }


}