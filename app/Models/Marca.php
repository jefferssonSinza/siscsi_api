<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:00 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Marca extends  Model {
    protected  $guarded= ['id'];
    protected  $fillable=['nombre'];
    protected  $table='marca';
    public $timestamps = false;
}