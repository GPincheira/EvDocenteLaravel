<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    //
    protected $table = 'procesos';
    protected $fillable = [
        'año','inicio','fin','Estado'
    ];


    protected $primaryKey ="año";
}
