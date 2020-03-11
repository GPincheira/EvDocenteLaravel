<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

  public function user()
  {
    return $this->belongsTo('App\User','id','id');
  }

  public function facultad()
  {
    return $this->belongsTo('App\facultad','CodigoFacultad','id');
  }
}
