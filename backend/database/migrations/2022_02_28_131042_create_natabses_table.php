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
        Schema::create('natabses', function (Blueprint $table) {
            $table->Increments('CODE_ABS');
            $table->string('LIBELLE_ABS',50);
            $table->string('TYPE_ABS',10);
            $table->integer('TYPE_ABS_PR');
            $table->integer('TYPE_ABS_13');
            $table->integer('TYPE_ABS_PROD');
            $table->integer('TYPE_ABS_CNR');
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
        Schema::dropIfExists('natabses');
    }
};
