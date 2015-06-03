<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
class Usuario  extends  Model implements  Authenticatable{

    protected  $guarded= ['id'];
    protected  $hidden=['contrasena'];
    protected  $fillable=['codigo','documento_identidad','nombre','apellido','correo_electronico','contrasena','tipo_usuario'];
    protected  $table='usuario';
    public $timestamps = false;

    public  function  setContrasenaAttribute($value){
        $this->attributes['contrasena']=bcrypt($value);
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password();
    }
    public function getRememberToken()
    {

    }
    public function setRememberToken($value)
    {

    }
    public function getRememberTokenName()
    {

    }

    public function scopelogin($query,$codigo,$contrasena)
    {
        return $query->wherecodigoAndcontrasena($codigo,$contrasena)->first();
    }

}