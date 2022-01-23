<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("apellidoPaterno");
            $table->string("apellidoMaterno");
            $table->string("calle");
            $table->string("numero");
            $table->string("colonia");
            $table->string("cp");
            $table->string("email");
            $table->string("phone");
            $table->integer("puesto");
            $table->string("rfc");
            $table->boolean("Estatus")->default(0);
            $table->string("Motive")->nullable();
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
        Schema::dropIfExists('prospects');
    }
}
