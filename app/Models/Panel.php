<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:02 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Panel  extends Model{
    protected  $guarded= ['id'];
    protected  $fillable=['nombre','sigla','modelo','serial','inventario_ufps','tipo_panel','cant_punto','categoria-cable_id','rack_id'];
    protected  $table='panel';
    public $timestamps = false;
}