<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bien extends Model
{
  use SoftDeletes;
  protected $table    = 'biens';
  protected $fillable = [ 'id', 'colegio', 'responsable', 'telefono', 'observacion', 'profesor', 'celular_profesor', 'observacion_profesor', 'nombre1', 'nombre2', 'ci1', 'ci2' ];
  protected $dates    = ['deleted_at'];
}
