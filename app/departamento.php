<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//modelo departamento, en el que se hace la declaracion para utilizar softDeletes, y en cascada
class departamento extends Model
{
  use SoftDeletes;
  use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

  protected $fillable = [
      'id','Nombre','CodigoFacultad','Estado'
  ];

  protected $dates = ['deleted_at'];

  protected $softCascade = ['academicos'];

  protected $primaryKey ="id";

  //relaciones de la tabla, donde una facultad puede tener muchos departamentos
  public function facultad()
  {
    return $this->belongsTo('App\facultad','CodigoFacultad','id');
  }

//relaciones de la tabla, donde un departamento puede tener muchos academicos
  public function academicos()
  {
      return $this->hasMany('App\academico','CodigoDpto');
  }

}
