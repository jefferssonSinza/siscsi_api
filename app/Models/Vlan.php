<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:00 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Vlan extends  Model {
    protected  $guarded= ['id'];
    protected  $fillable=['nombre','ipv4_inicial','ipv4_final','mascara_ipv4','ipv6_inicio','ipv6_final','mascara_ipv6'];
    protected  $table='vlan';
    public $timestamps = false;
}