<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//modelo comision
class comision extends Model
{
  use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

  protected $table = 'comisiones';
  protected $fillable = [
      'Año','Fecha','CodigoFacultad','NombreDecano','APaternoDecano','AMaternoDecano','idSecFacultad',
      'NombreSecFac','APaternoSecFac','AMaternoSecFac','Nombre1','APaterno1','AMaterno1','Nombre2',
      'APaterno2','AMaterno2'
  ];
  protected $primaryKey ="id";

  //relaciones de la tabla, donde una facultad puede tener muchas comisiones
  public function facultad()
  {
    return $this->belongsTo('App\facultad','CodigoFacultad','id');
  }

  //una comision puede realizar muchas evaluaciones
  public function evaluaciones()
  {
      return $this->hasMany('App\evaluacion','CodigoComision');
  }
}
