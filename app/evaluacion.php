<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//modelo evaluacion, en el que se hace la declaracion para utilizar softDeletes
class evaluacion extends Model
{
  use SoftDeletes;
  use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

  protected $table = 'evaluaciones';
  protected $fillable = [
      'CodigoComision','CodigoFacultad','RUTAcademico','Argumento','año','n1','n2',
      'n3','n4','n5','p1','p2','p3','p4','p5','NotaFinal'
  ];

  protected $dates = ['deleted_at'];

  protected $primaryKey ="id";

  //relaciones de la tabla, donde una comision puede realizar muchas evaluaciones
  public function comision()
  {
    return $this->belongsTo('App\comision','CodigoComision','id');
  }

  public function facultad()
  {
    return $this->belongsTo('App\facultad','CodigoFacultad','id');
  }

  //relaciones de la tabla, donde una academico puede tener muchas evaluaciones
  public function academico()
  {
    return $this->belongsTo('App\academico','RUTAcademico','id');
  }
}
