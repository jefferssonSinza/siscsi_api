<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:21 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Solicitud_mantenimiento extends  Model {
    protected  $guarded= ['id'];
    protected  $fillable=['fecha','oficina_id','observacion','estado'];
    protected  $table='Solicitud-mantenimiento';
    public $timestamps = false;

}