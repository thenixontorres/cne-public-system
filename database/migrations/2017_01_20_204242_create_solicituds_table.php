<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesolicitudsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table-> integer('titular_id')->unsigned();
            $table->foreign('titular_id')->references('id')->on('titulars');

            $table-> integer('tipoacta_id')->unsigned();
            $table->foreign('tipoacta_id')->references('id')->on('tipoactas');
            $table->increments('id');

            $table-> string('numero_acta');
            $table-> string('fecha_acta');
            $table-> integer('receptor_id')->unsigned();
            $table->foreign('receptor_id')->references('id')->on('receptors');
            
            $table-> integer('solicitante_id')->unsigned();
            $table->foreign('solicitante_id')->references('id')->on('solicitantes');
            $table-> string('solicitado_a');
            $table-> string('fecha_solicitud');
            $table-> string('via');
            $table-> string('recibido');   
            $table-> string('estatus_tramite');
            $table-> integer('responsable_id')->unsigned();
            $table->foreign('responsable_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('solicituds');
    }
}
