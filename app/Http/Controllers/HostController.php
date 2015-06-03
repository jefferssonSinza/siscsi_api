<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 12:04 AM
 */

namespace app\Http\Controllers;


use App\Models\Host;
use App\Validators\HostValidator;

class HostController extends Controller  {

    public function  index()
    {
        $hosts= Host::all();
        return response()->json($hosts,200);
    }

    public function  store(request $request)
    {
        $validacion =  new  HostValidator($request);
        if($validacion->isAccept()){
            $host = new Host($request->all());
            $host->save();
            return response()->json(['mensaje'=>'Host Registrado'], 201);
        }else {
            return response()->json([$validacion->getMessages()],400);
        }
    }

    public function  destroy($id)
    {
      try {
          $host = Host::find($id);
          if (!$host) {
              return response()->json(['mensaje' => 'Host no encontrado'], 404);
          } else {
              $host->delete();
              return response()->json(['mensaje' => 'Host eliminado'], 201);
          }
      }
        catch (\Illuminate\Database\QueryException $e){
                return response()->json(['mensaje'=> 'Host  no se puede  eliminar '],404);
            }

    }

    public function  update($id,request $request)
    {
            $host = Host::find($id);
            if(!$host){
                return  response()->json(['mensaje'=>'Host no encontrado'],404);
            }else{
                $validacion =  new  HostValidator($request);
                if($validacion->isAccept()){
                $host->fill($request->all());
                $host->save();
                return response()->json(['mensaje'=>'Host actualizado'],201);
            }else
                {
                    return response()->json([$validacion->messages()],400);
                }
        }
    }

    public function  show($id)
    {
        $host= Host::find($id);
        if(!$host){
            return response()->json(['mensaje'=>'Host no Encontrado'],404);
        }else{
            return response()->json($host,200);
        }
    }




}