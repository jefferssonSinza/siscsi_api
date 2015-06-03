<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:02 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Centro_cableado  extends  Model{
    protected  $guarded= ['id'];
    protected  $fillable=['nombre','sigla','descripcion','ubicacion','edificio_id'];
    protected  $table='centro-cableado';
    public $timestamps = false;

}