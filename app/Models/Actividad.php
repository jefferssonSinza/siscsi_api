<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 20/05/2015
 * Time: 10:16 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Actividad extends  Model {

    protected  $guarded= ['id'];
    protected  $fillable=['nombre','descripcion'];
    protected  $table='actividad';
    public $timestamps = false;

}