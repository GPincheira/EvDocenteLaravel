<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class facultad extends Model
{
  use SoftDeletes;

  protected $table = 'facultades';
  protected $fillable = [
      'id','Nombre','DecanoNombre','DecanoAPaterno','DecanoAMaterno','Estado'
  ];
  protected $dates = ['deleted_at'];

  protected $primaryKey ="id";
}
