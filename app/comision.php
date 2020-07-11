<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//modelo comision
class comision extends Model
{
  use SoftDeletes;
  use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

  protected $table = 'comisiones';
  protected $fillable = [
      'Año','Fecha','CodigoFacultad','NombreDecano','APaternoDecano','AMaternoDecano','idSecFacultad',
      'NombreSecFac','APaternoSecFac','AMaternoSecFac','Nombre1','APaterno1','AMaterno1','Nombre2',
      'APaterno2','AMaterno2','Estado'
  ];
  protected $primaryKey ="id";
  protected $dates = ['deleted_at'];

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
