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
        Schema::create('cconges', function (Blueprint $table) {
            $table->Increments('CCONG_MAT_95');
            $table->integer('CCONG_NAT_9')->nullable();
            $table->integer('CCONG_CET_9')->nullable();
            $table->integer('CCONG_DROIT_93')->nullable();
            $table->date('CCONG_DATE_MAJ')->nullable();
            $table->date('INSERT_DATE')->nullable();
            $table->string('INSERT_USER',35)->nullable();
            $table->date('UPDATE_DATE')->nullable();
            $table->string('UPDATE_USER',35)->nullable();
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
        Schema::dropIfExists('cconges');
    }
};
