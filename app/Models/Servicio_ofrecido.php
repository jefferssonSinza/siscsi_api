<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 2:42 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Servicio_ofrecido extends  Model {

    protected  $guarded= ['id'];
    protected  $fillable=['fecha','sugerencia','ip','inv_pc','estado','calificacion','solicitud-mantenimiento_id'];
    protected  $table='servicio-ofrecido';
    public $timestamps = false;
}