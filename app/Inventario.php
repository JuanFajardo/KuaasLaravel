<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Inventario extends Model
{
  use SoftDeletes;
  protected $table    = 'inventarios';
  protected $fillable = [ 'id', 'curso', 'anio', 'estado', 'observacion', 'codigo', 'codigo_cajon', 'bien_id', 'fecha'];
  protected $dates    = ['deleted_at'];
}
