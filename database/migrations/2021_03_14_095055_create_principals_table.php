<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrincipalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('principals', function (Blueprint $table) {
            $table->id();
            $table->char("planner",50)->nullable();
            $table->char("oscontrato",50)->nullable();
            $table->char("ruc",50)->nullable();
            $table->char("fecha_internamiento_hotel",50)->nullable();
            $table->char("fecha_de_parada",50)->nullable();
            $table->char("turno_de_trabajo_dia_d_noche_n",50)->nullable();
            $table->char("ap_paterno",50)->nullable();
            $table->char("ap_materno",50)->nullable();
            $table->char("first_name",50)->nullable();
            $table->char("second_name",50)->nullable();
            $table->char("gerencia",50)->nullable();
            $table->char("superintendencia",100)->nullable();
            $table->char("dni",50)->unique();
            $table->char("fecha_de_nacimiento",50)->nullable();
            $table->char("posicion",50)->nullable();
            $table->char("hotel_lima_huaraz",50)->nullable();
            $table->char("residencia_departamento",50)->nullable();
            $table->char("empresa",50)->nullable();
            $table->char("telefono",50)->nullable();
            $table->char("correo_electronico",100)->nullable();
            $table->char("hotel_donde_esta_internado",50)->nullable();
            $table->char("minsa",50)->nullable();
            $table->char("personnel",50)->nullable();
            $table->char("observaciones_2personnel",50)->nullable();
            $table->char("desc_hotel",50)->nullable();
            $table->char("codhotel",50)->nullable();
            $table->char("tipo_de_registro",50)->nullable();
            $table->char("fecha_ingreso_a_hotel",50)->nullable();
            $table->char("condicion_apto_no_apto",50)->nullable();
            $table->char("fecha_de_prueba",50)->nullable();
            $table->char("fecha_de_viaje",50)->nullable();
            $table->char("hora",50)->nullable();
            $table->text("comentarios")->nullable();
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
        Schema::dropIfExists('principals');
    }
}
