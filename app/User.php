<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

//modelo usuario, en el que se hace la declaracion para utilizar softDeletes, y en cascada
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id','verificador','Nombre','email','password','ApellidoPaterno','ApellidoMaterno',
        'Estado',
    ];

    protected $dates = ['deleted_at'];
//si se elimina el registro, tambien se hace con el asignado al secretario de facultad
    protected $softCascade = ['secFacultad'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'id';
    public $incrementing = false;

    //relacion de la tabla usuario, que puede tener solo un registro de secretario de facultad asignado
    public function secFacultad() {
      return $this->hasOne('App\secFacultad','id');
    }

}
