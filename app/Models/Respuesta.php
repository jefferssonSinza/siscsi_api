<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:41 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model {
    protected  $guarded= ['id'];
    protected  $fillable=['respuesta'];
    protected  $table='respuesta';
    public $timestamps = false;
}