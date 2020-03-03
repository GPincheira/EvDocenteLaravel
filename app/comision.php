<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comision extends Model
{
  protected $table = 'comisiones';
  protected $fillable = [
      'Año','Fecha','CodigoFacultad','NombreDecano','idSecFacultad',
      'NombreSecFacultad','Nombre1','Nombre2'
  ];

}
