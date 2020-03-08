<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class academico extends Model
{
  protected $fillable = [
      'id','verificador','Nombre','ApellidoPaterno','ApellidoMaterno','TituloProfesional',
      'GradoAcademico','CodigoDpto','Categoria','HorasContrato','TipoPlanta','Estado'
  ];
  protected $primaryKey ="id";
}
