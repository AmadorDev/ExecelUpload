<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
                 $table->id();
                 $table->char("planner")->nullable();
                 $table->char("contrato")->nullable();
                 $table->char("ruc",11)->nullable();
                 $table->char("fecha_in",100)->nullable();
                 $table->char("fecha_pa",100)->nullable();
                 $table->char("turno_trabajo",100)->nullable();
                 $table->char("ap_paterno",100)->nullable();
                 $table->char("ap_materno",100)->nullable();
                 $table->char("first_name",100)->nullable();
                 $table->char("second_name",100)->nullable();
                 $table->char("gerencia",100)->nullable();
                 $table->char("superintendencia",100)->nullable();
                 $table->char("dni",100)->nullable();
                 $table->char("fecha_nacimiento",100)->nullable();
                 $table->char("posicion",100)->nullable();
                 $table->char("hotel",100)->nullable();
                 $table->char("residencia",100)->nullable();
                 $table->char("empresa",100)->nullable();
                 $table->char("telefono",100)->nullable();
                 $table->char("email",100)->nullable();
                 $table->char("minsa",100)->nullable();
                 $table->char("2personnel",100)->nullable();
                 $table->char("desc_hotel",100)->nullable();
                 $table->char("codhotel",100)->nullable();
                 $table->char("tipo_registro",100)->nullable();
                 $table->char("condicion",100)->nullable();
                 $table->char("movilizacion_mina",100)->nullable();
                 $table->char("habitacion_confirmado",100)->nullable();
                 $table->char("direccion",100)->nullable();
                 $table->char("distrito",100)->nullable();
                 $table->char("provincia",100)->nullable();
                 $table->char("pais",100)->nullable();
                 $table->char("viaje",200)->nullable();
                 $table->text("fecha_viaje")->nullable();
                 $table->char("hora",100)->nullable();
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
        Schema::dropIfExists('tareas');
    }
}
