<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:55 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Edificio  extends  Model{

    protected  $guarded= ['id'];
    protected  $fillable=['nombre','sigla'];
    protected  $table='edificio';
    public $timestamps = false;

    public  function  Dependencias(){
        return $this->hasMany('App\Models\Dependencia');
    }

   public  function  Oficinas(){
       return $this->hasManyThrough('App\Models\Dependencia', 'App\Models\Oficina');
   }

}