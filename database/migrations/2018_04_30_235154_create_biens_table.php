<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiensTable extends Migration
{
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
          $table->increments('id');
          $table->string('colegio');
          $table->string('responsable');
          $table->string('telefono');
          $table->string('observacion');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biens');
    }
}
