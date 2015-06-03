<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 10:06 AM
 */

namespace app\Models;


use Illuminate\Database\Eloquent\Model;

class Time_sistema extends  Model {
    protected  $guarded= ['id'];
    protected  $fillable=['fecha_ingreso','fecha_salida'];
    protected  $table='time-sistema';
    public $timestamps = false;
}