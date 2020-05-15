<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//modelo secFacultad, en el que se hace la declaracion para utilizar softDeletes
class secFacultad extends Model
{
  use SoftDeletes;

  protected $table = 'secFacultades';
  protected $fillable = [
      'id','CodigoFacultad'
  ];
  protected $dates = ['deleted_at'];

  protected $primaryKey ="id";
  public $incrementing = false;

  //relaciones de la tabla, donde un usuario puede corresponder a un secretario de facultad
  public function user()
  {
    return $this->belongsTo('App\User','id','id');
  }

//relaciones de la tabla, donde un secretario de facultad corresponde a solo una facultad
  public function facultad()
  {
    return $this->belongsTo('App\facultad','CodigoFacultad','id');
  }
}
