<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facultad extends Model
{
  protected $table = 'facultades';
  protected $fillable = [
      'Nombre','DecanoNombre','DecanoAPaterno','DecanoAMaterno','Estado'
  ];
}
