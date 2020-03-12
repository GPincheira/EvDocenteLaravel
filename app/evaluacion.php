<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class evaluacion extends Model
{
  use SoftDeletes;

  protected $table = 'evaluaciones';
  protected $fillable = [
      'CodigoComision','RUTAcademico','Argumento','año','n1','n2',
      'n3','n4','n5','p1','p2','p3','p4','p5','NotaFinal'
  ];

  protected $dates = ['deleted_at'];

  protected $primaryKey ="id";

  public function comision()
  {
    return $this->belongsTo('App\comision','CodigoComision','id');
  }

  public function academico()
  {
    return $this->belongsTo('App\academico');
  }
}
