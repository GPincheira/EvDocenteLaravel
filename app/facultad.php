<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//modelo facultad, en el que se hace la declaracion para utilizar softDeletes, y en cascada
class facultad extends Model
{
  use SoftDeletes;
  use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

  protected $table = 'facultades';
  protected $fillable = [
      'id','Nombre','DecanoNombre','DecanoAPaterno','DecanoAMaterno','Estado'
  ];
  protected $dates = ['deleted_at'];

//al eliminarse, eliminara en cascada a departamentos
  protected $softCascade = ['departamentos'];

  protected $primaryKey ="id";

  //relaciones de la tabla, donde una facultad puede tener muchos departamentos
  public function departamentos()
  {
      return $this->hasMany('App\departamento','CodigoFacultad');
  }

//relaciones de la tabla, donde una facultad puede tener solo un secretario de facultad
  public function secFacultad()
  {
      return $this->hasOne('App\secFacultad','CodigoFacultad');
  }

//relaciones de la tabla, donde una facultad puede tener muchas comisiones
  public function comisiones()
  {
      return $this->hasMany('App\comision','CodigoFacultad');
  }

//relaciones en cadena, donde por el intermedio de departamentos, se declara que una facultad tiene muchos academico
  public function academicos()
  {
    return $this->hasManyThrough('App\academico', 'App\departamento', 'CodigoFacultad',
                                'CodigoDpto', 'id', 'id');
  }

}
