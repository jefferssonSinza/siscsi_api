<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('inicio',function(){

});
$app->group(['prefix' => 'usuario'],function($app){
        $app->get('{id}',['uses' =>'App\Http\Controllers\UsuarioController@show']); //  ruta   de mostrar la información un usuario
        $app->delete('{id}',['uses' =>'App\Http\Controllers\UsuarioController@destroy']); //ruta para eliminar un usuario
        $app->put('{id}',['uses' =>'App\Http\Controllers\UsuarioController@update']); //ruta para  modificar un usuario
        $app->post('',['uses' =>'App\Http\Controllers\UsuarioController@store']); // ruta para crear un nuevo usuario
        $app->get('',['uses' =>'App\Http\Controllers\UsuarioController@index']); //ruta para mostrar todos los usuarios
});

$app->group(['prefix' => 'actividad'],function($app){
        $app->get('{id}',['uses' =>'App\Http\Controllers\ActividadController@show']);
        $app->delete('{id}',['uses' =>'App\Http\Controllers\ActividadController@destroy']);
        $app->put('{id}',['uses' =>'App\Http\Controllers\ActividadController@update']);
        $app->post('',['uses' =>'App\Http\Controllers\ActividadController@store']);
        $app->get('',['uses' =>'App\Http\Controllers\ActividadController@index']);
});

$app->group(['prefix' =>'semestre'],function($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\SemestreController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\SemestreController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\SemestreController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\SemestreController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\SemestreController@index']);

});

$app->group(['prefix'=>'edificio'],function($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\EdificioController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\EdificioController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\EdificioController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\EdificioController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\EdificioController@index']);


});

$app->group(['prefix'=>'dependencia'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\DependenciaController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\DependenciaController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\DependenciaController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\DependenciaController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\DependenciaController@index']);
});

$app->group(['prefix'=>'oficina'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\OficinaController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\OficinaController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\OficinaController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\OficinaController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\OficinaController@index']);

});

$app->group(['prefix'=>'servicio'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\ServicioController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\ServicioController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\ServicioController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\ServicioController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\ServicioController@index']);

});

$app->group(['prefix'=>'marca'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\MarcaController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\MarcaController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\MarcaController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\MarcaController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\MarcaController@index']);

});
$app->group(['prefix'=>'anomalia'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\AnomaliaController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\AnomaliaController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\AnomaliaController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\AnomaliaController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\AnomaliaController@index']);

});

$app->group(['prefix'=>'vlan'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\VlanController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\VlanController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\VlanController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\VlanController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\VlanController@index']);

});

$app->group(['prefix'=>'categoria_cable'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\Categoria_cableController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\Categoria_cableController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\Categoria_cableController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\Categoria_cableController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\Categoria_cableController@index']);

});

$app->group(['prefix'=>'host'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\HostController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\HostController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\HostController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\HostController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\HostController@index']);

});

$app->group(['prefix'=>'centro_cableado'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\Centro_cableadoController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\Centro_cableadoController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\Centro_cableadoController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\Centro_cableadoController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\Centro_cableadoController@index']);

});

$app->group(['prefix'=>'rack'],function ($app){
    $app->get('{id}',['uses' =>'App\Http\Controllers\RackController@show']);
    $app->delete('{id}',['uses' =>'App\Http\Controllers\RackController@destroy']);
    $app->put('{id}',['uses' =>'App\Http\Controllers\RackController@update']);
    $app->post('',['uses' =>'App\Http\Controllers\RackController@store']);
    $app->get('',['uses' =>'App\Http\Controllers\RackController@index']);

});

$app->group(['prefix'=>'login'],function ($app){
    $app->post('',['uses' =>'App\Http\Controllers\RackController@login']);
    $app->get('',['uses' =>'App\Http\Controllers\RackController@logout']);
});






