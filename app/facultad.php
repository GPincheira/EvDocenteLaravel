<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facultad extends Model
{
  protected $table = 'facultades';
  protected $fillable = [
      'id','Nombre','DecanoNombre','DecanoAPaterno','DecanoAMaterno','Estado'
  ];

  protected $primaryKey ="id";
}
