<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class academico extends Model
{
  use SoftDeletes;

  protected $fillable = [
      'id','verificador','Nombre','ApellidoPaterno','ApellidoMaterno','TituloProfesional',
      'GradoAcademico','CodigoDpto','Categoria','HorasContrato','TipoPlanta','Estado'
  ];
  protected $dates = ['deleted_at'];

  protected $primaryKey ="id";

  public function departamento()
  {
    return $this->belongsTo('App\departamento','CodigoDpto','id');
  }

  public function evaluaciones()
  {
      return $this->hasMany('App\evaluacion','RUTAcademico');
  }
}
