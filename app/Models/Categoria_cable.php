<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:01 PM
 */

namespace App\Models;


class Categoria_cable {

    protected  $guarded= ['id'];
    protected  $fillable=['nombre'];
    protected  $table='categoria-cable';
    public $timestamps = false;

}