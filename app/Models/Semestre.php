<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 20/05/2015
 * Time: 10:16 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Semestre extends Model {

    protected  $guarded= ['id','activo'];
    protected  $fillable=['nombre','inicio_semestre','fin_semestre'];
    protected  $table='semestre';
    public $timestamps = false;


    public function scopeSemestreActivo($query)
    {
        return $query->where('activo', '1')->first();
    }

}