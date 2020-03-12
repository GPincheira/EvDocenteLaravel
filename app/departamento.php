<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class departamento extends Model
{
  use SoftDeletes;
  use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

  protected $fillable = [
      'id','Nombre','CodigoFacultad','Estado'
  ];

  protected $dates = ['deleted_at'];

  protected $softCascade = ['academicos'];

  protected $primaryKey ="id";

  public function facultad()
  {
    return $this->belongsTo('App\facultad','CodigoFacultad','id');
  }

  public function academicos()
  {
      return $this->hasMany('App\academico','CodigoDpto');
  }

}
