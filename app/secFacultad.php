<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secFacultad extends Model
{
  protected $table = 'secFacultades';
  protected $fillable = [
      'CodigoFacultad'
  ];

  protected $primaryKey ="id";
  public $incrementing = false;
}
