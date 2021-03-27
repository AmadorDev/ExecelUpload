<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->char("cia",100)->nullable();
            $table->char("contrato",100)->nullable();
            $table->char("dni",8)->unique();
            $table->char("reingr",8)->nullable();
            $table->char("paterno",100)->nullable();
            $table->char("materno",100)->nullable();
            $table->char("nombre",100)->nullable();
            $table->char("fecha_ini",100)->nullable();
            $table->char("fecha_fin",100)->nullable();
            $table->char("fecha_insc",100)->nullable();
            $table->char("estado",100)->nullable();
            $table->char("req_pend",100)->nullable();
            $table->char("cod_foto",100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
