<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 2:58 PM
 */

namespace App\Http\Controllers;

use App\Models\Servicio_ofrecido;
use App\Validators\Servicio_ofrecidoValidator;
use Symfony\Component\HttpKernel\Tests\Controller;

class Servicio_ofrecidoController  extends Controller{

    public function  index()
    {
        $Servicio_ofrecidos= Servicio_ofrecido::all();
        return response()->json($Servicio_ofrecidos,200);
    }

    public function  store(request $request)
    {
            $validacion = new Servicio_ofrecidoValidator($request);
            if($validacion->isAccept()){
                $servicio_ofrecido = new Servicio_ofrecido($request->all());
                $servicio_ofrecido->save();
                return response()->json(['mensaje'=>'Servicio Ofrecido Registrado'], 201);
            }else {
                return response()->json([$validacion->getMessages()],400);
            }
    }

    public function  destroy($id){
        try {
            $servicio_ofrecido = Servicio_ofrecido::find($id);
            if (!$servicio_ofrecido) {
                return response()->json(['mensaje' => 'Servicio Ofrecido  no encontrado'], 404);
            } else {
                $servicio_ofrecido->delete();
                return response()->json(['mensaje' => 'Servicio Ofrecido  desactivado'], 201);
            }
        }
        catch (\Illuminate\Database\QueryException $e){
            return response()->json(['mensaje'=> 'Servicio Ofrecido  no se puede  eliminar '],404);
        }
    }

    public function  update($id, request $request)
    {
        $servicio_ofrecido = Servicio_ofrecido::find($id);
        if(!$servicio_ofrecido){
            return  response()->json(['mensaje'=>'Servicio Ofrecido  no encontrado'],404);
        }else {
                $validacion = new Servicio_ofrecidoValidator($request);
                if ($validacion->isAccept()) {
                    $servicio_ofrecido->fill($request->all());
                    $servicio_ofrecido->save();
                    return response()->json(['mensaje' => 'Servicio Ofrecido  actualizado'], 201);
                } else {
                    return response()->json([$validacion->getMessages()], 400);
                }
            }

    }


    public function  show($id)
    {
        $servicio_ofrecido= Servicio_ofrecido::find($id);
        if(!$servicio_ofrecido){
            return response()->json(['mensaje'=>'Semestre no Encontrado'],404);
        }else{
            return response()->json($servicio_ofrecido,200);
        }
    }

}