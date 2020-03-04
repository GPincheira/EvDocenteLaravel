<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluacion extends Model
{
  protected $table = 'evaluaciones';
  protected $fillable = [
      'CodigoComision','RUTAcademico','Argumento','n1','n2',
      'n3','n4','n5','p1','p2','p3','p4','p5','NotaFinal'
  ];

  protected $primaryKey ="id";
}
