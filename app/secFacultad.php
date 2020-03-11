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
}
