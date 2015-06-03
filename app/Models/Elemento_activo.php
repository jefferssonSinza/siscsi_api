<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:03 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Elemento_activo extends  Model{
    protected  $guarded= ['id'];
    protected  $fillable=['serial','inventario_ufps','cant_interfaz','rack_id','tipo-elemento-activo_id'];
    protected  $table='elemento-activo';
    public $timestamps = false;

public  function Tipo_elemento_activo(){
    return $this->belongsTo('App\Models\Tipo_elemento_activo');
}
}