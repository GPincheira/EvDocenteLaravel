<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comision extends Model
{
  protected $table = 'comisiones';
  protected $fillable = [
      'Año','Fecha','CodigoFacultad','NombreDecano','APaternoDecano','AMaternoDecano','idSecFacultad',
      'NombreSecFac','APaternoSecFac','AMaternoSecFac','Nombre1','APaterno1','AMaterno1','Nombre2',
      'APaterno2','AMaterno2'
  ];
  protected $primaryKey ="id";
}
