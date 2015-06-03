<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:00 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Anomalia extends Model {
    protected  $guarded= ['id'];
    protected  $fillable=['nombre','descripcion'];
    protected  $table='anomalia';
    public $timestamps = false;
}