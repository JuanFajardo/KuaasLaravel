<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bien extends Model
{
  use SoftDeletes;
  protected $table    = 'biens';
  protected $fillable = [ 'id', 'colegio', 'responsable', 'telefono', 'observacion', 'nombre1', 'nombre2', 'ci1', 'ci2' ];
  protected $dates    = ['deleted_at'];
}
