<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:01 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Rack extends  Model {
    protected  $guarded= ['id'];
    protected  $fillable=['serial','sigla','inventario_ufps','marca_id','centro-cableado_id'];
    protected  $table='rack';
    public $timestamps = false;
}