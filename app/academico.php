<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//modelo academico, en el que se hace la declaracion para utilizar softDeletes
class academico extends Model
{
  use SoftDeletes;
  use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

  protected $fillable = [
      'id','verificador','Nombre','ApellidoPaterno','ApellidoMaterno','TituloProfesional',
      'GradoAcademico','CodigoDpto','CodigoFacultad','Categoria','HorasContrato','TipoPlanta','Estado'
  ];
  protected $dates = ['deleted_at'];
  //dato que se utiliza la el soft delete
  protected $softCascade = ['evaluaciones'];

  protected $primaryKey ="id";

  //relaciones de la tabla, donde un dpto puede tener muchos usuarios
  public function departamento()
  {
    return $this->belongsTo('App\departamento','CodigoDpto','id');
  }

  public function facultad()
  {
    return $this->belongsTo('App\facultad','CodigoFacultad','id');
  }

  //relaciones de la tabla, donde el academico puede tener muchas evaluaciones
  public function evaluaciones()
  {
      return $this->hasMany('App\evaluacion','RUTAcademico');
  }
}
