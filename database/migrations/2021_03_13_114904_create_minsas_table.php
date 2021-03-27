<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minsas', function (Blueprint $table) {
            $table->id();
            $table->char("apellido_paterno",20)->nullable();
            $table->char("apellido_materno",20)->nullable();
            $table->char("nombres_1",50)->nullable();
            $table->char("nombres_2",50)->nullable();
            $table->char("regimen",50)->nullable();
            $table->char("especificacion_otro_regimen",50)->nullable();
            $table->char("tipo_contratacion",50)->nullable();
            $table->char("ruc_contrata",50)->nullable();
            $table->char("tipo_documento",50)->nullable();
            $table->char("numero_de_documento",50)->unique();
            $table->char("correo",50)->nullable();
            $table->char("telefono",20)->nullable();
            $table->char("modalidad_de_trabajo",50)->nullable();
            $table->char("factor_de_riesgo_comorbilidad",50)->nullable();
            $table->char("puesto_de_trabajo",100)->nullable();
            $table->char("muy_alto",20)->nullable();
            $table->char("alto",20)->nullable();
            $table->char("medio",20)->nullable();
            $table->char("bajo",20)->nullable();
            $table->char("reinicio_de_actividades",50)->nullable();
            $table->char("fecha_de_reinicio",50)->nullable();
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
        Schema::dropIfExists('minsas');
    }
}
