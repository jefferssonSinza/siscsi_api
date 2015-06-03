<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 30/05/2015
 * Time: 3:40 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pregunta extends  Model {
    protected  $guarded= ['id'];
    protected  $fillable=['pregunta'];
    protected  $table='pregunta';
    public $timestamps = false;
}