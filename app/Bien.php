<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bien extends Model
{
  use SoftDeletes;
  protected $table    = 'biens';
  protected $fillable = [ 'id', 'colegio', 'responsable', 'telefono', 'observacion' ];
  protected $dates    = ['deleted_at'];
}
