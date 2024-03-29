<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->integer("prodId");
            $table->double("montantUnit");
            $table->integer("qty");
            $table->double("totalAmount")->default(0);
            $table->integer("rabais")->nullable();
            $table->integer("userId");
            $table->integer("ClientId")->nullable();
            $table->string("numeroChek")->nullable();
            $table->string("etat");
            $table->string("paymethod");
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
        Schema::dropIfExists('ventes');
    }
}
