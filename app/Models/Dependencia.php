<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:55 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Dependencia  extends  Model{

    protected  $guarded= ['id'];
    protected  $fillable=['nombre','edificio_id'];
    protected  $table='dependencia';
    public $timestamps = false;

    public  function  edificio(){
        return $this->belongsTo('App\Models\Edificio');
    }


}