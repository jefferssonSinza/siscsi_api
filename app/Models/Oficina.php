<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:55 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Oficina  extends  Model{

    protected  $guarded= ['id'];
    protected  $fillable=['nombre','num_oficina','num_extension','cant_punto','dependencia_id'];
    protected  $table='oficina';
    public $timestamps = false;


    public  function  Dependencia(){
        return $this->belongsTo('App\Models\Dependencia');
    }

}