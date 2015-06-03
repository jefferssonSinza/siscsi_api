<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 21/05/2015
 * Time: 11:02 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Beca_trabajo extends  Model {

    protected  $guarded= ['id'];
    protected  $fillable=['usuario_id','semestre_id','hora_cumplida'];
    protected  $table='beca_trabajo';
    public $timestamps = false;
}