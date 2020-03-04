<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
  protected $fillable = [
      'Nombre','CodigoFacultad','Estado'
  ];

  protected $primaryKey ="id";
}
