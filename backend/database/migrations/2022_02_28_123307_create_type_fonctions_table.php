<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_fonctions', function (Blueprint $table) {
            $table->Increments('CODE_TYPE');
            $table->string('LIB_TYPE',100);
            $table->integer('MONTANT')->nullable();
            $table->string('CODF_CNRPS',4)->nullable();
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
        Schema::dropIfExists('type_fonctions');
    }
};
