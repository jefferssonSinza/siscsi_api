<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 22/05/2015
 * Time: 4:28 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tipo_elemento_activo extends Model {
    protected  $guarded= ['id'];
    protected  $fillable=['nombre'];
    protected  $table='tipo-elemento-activo';
    public $timestamps = false;


    public  function  Elementos_activo(){
        return $this->hasMany('App\Models\Elemento_activo');
    }

}