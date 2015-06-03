<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:03 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Host extends  Model {

    protected  $guarded= ['id'];
    protected  $fillable=['hostname','direccion_ipv4','mascara_ipv4','direccion_ipv6','mascara_ipv6','inventario_ufps','marca_nic','mac','grupo_trabajo','dominio','vlan_id','punto_id','oficina_id'];
    protected  $table='marca';
    public $timestamps = false;
}