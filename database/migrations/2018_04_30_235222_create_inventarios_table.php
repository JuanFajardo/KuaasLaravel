<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('curso');
          $table->integer('anio');
          $table->string('estado');
          $table->string('observacion');
          $table->string('codigo')->unique();
          $table->string('codigo_cajon')->unique();
          $table->integer('bien_id');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
