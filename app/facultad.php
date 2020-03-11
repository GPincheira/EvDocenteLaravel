<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class facultad extends Model
{
  use SoftDeletes;

  protected $table = 'facultades';
  protected $fillable = [
      'id','Nombre','DecanoNombre','DecanoAPaterno','DecanoAMaterno','Estado'
  ];
  protected $dates = ['deleted_at'];

  protected $primaryKey ="id";

  public function departamentos()
  {
      return $this->hasMany('App\departamento','CodigoFacultad');
  }

  public function secFacultad()
  {
      return $this->hasOne('App\secFacultad','CodigoFacultad');
  }

  public function comisiones()
  {
      return $this->hasMany('App\comision','CodigoFacultad');
  }

  public function academicos()
  {
    return $this->hasManyThrough('App\academico', 'App\departamento');
  }

}
