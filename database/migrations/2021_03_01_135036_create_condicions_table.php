<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicions', function (Blueprint $table) {
            $table->id();
            $table->char("planner",100)->nullable();
            $table->char("oscontrato",100)->nullable();
            $table->char("ruc",15)->nullable();
            $table->char("fecha_internamiento_hotel",20)->nullable();
            $table->char("fecha_de_parada",20)->nullable();
            $table->char("turno_de_trabajo",9)->nullable();
            $table->char("ap_paterno",100)->nullable();
            $table->char("ap_materno",100)->nullable();
            $table->char("first_name",100)->nullable();
            $table->char("second_name",100)->nullable();
            $table->char("gerencia",100)->nullable();
            $table->char("superintendencia",100)->nullable();
            $table->char("dni",8)->unique();
            $table->char("fecha_de_nacimiento",20)->nullable();
            $table->char("posicion",100)->nullable();
            $table->char("hotel_lima_huaraz",100)->nullable();
            $table->char("residencia_departamento",100)->nullable();
            $table->char("empresa",100)->nullable();
            $table->char("telefono",100)->nullable();
            $table->char("correo_electronico",100)->nullable();
            $table->char("hotel",100)->nullable();
            $table->char("minsa",100)->nullable();
            $table->char("personnel",100)->nullable();
            $table->char("desc_hotel",100)->nullable();
            $table->char("codhotel",100)->nullable();
            $table->char("tipo_de_registro",9)->nullable();
            
            $table->char("condicion_apto_no_apto",100)->nullable();
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
        Schema::dropIfExists('condicions');
    }
}
