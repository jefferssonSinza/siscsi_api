<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:36 PM
 */

namespace App\Http\Controllers;


use App\Models\Vlan;
use App\Validators\VlanValidator;

class VlanController extends Controller {
    public function  index()
    {
        $vlans= Vlan::all();
        return response()->json($vlans,200);
    }

    public function  store(request $request)
    {
        $validacion =  new  VlanValidator($request);
        if($validacion->isAccept()){
            $vlan = new Vlan($request->all());
            $vlan->save();
            return response()->json(['mensaje'=>'Vlan Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

    public function  destroy($id)
    {  try {
        $vlan = Vlan::find($id);
        if (!$vlan) {
            return response()->json(['mensaje' => 'Vlan no encontrado'], 404);
        } else {
            $vlan->delete();
            return response()->json(['mensaje' => 'Vlan eliminado'], 201);
        }
    }catch (\Illuminate\Database\QueryException $e){
        return response()->json(['mensaje'=> 'Edificio  no se puede  eliminar '],404);
    }

    }

    public function  update($id,request $request)
    {
        $validacion =  new  VlanValidator($request);
        if($validacion->isAccept()){
            $vlan = Vlan::find($id);
            if(!$vlan){
                return  response()->json(['mensaje'=>'Vlan no encontrado'],404);
            }else{
                $vlan->fill($request->all());
                $vlan->save();
                return response()->json(['mensaje'=>'Vlan actualizado'],201);
            }
        }else
        {
            return response()->json([$validacion->messages()],400);
        }
    }

    public function  show($id)
    {
        $vlan= Vlan::find($id);
        if(!$vlan){
            return response()->json(['mensaje'=>'Vlan no Encontrado'],404);
        }else{
            return response()->json($vlan,200);
        }
    }




}