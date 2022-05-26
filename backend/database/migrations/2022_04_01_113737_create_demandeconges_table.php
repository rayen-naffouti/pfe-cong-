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
        Schema::create('demandeconges', function (Blueprint $table) {
            $table->id();
            // $table->string('name',250)->nullable();
            // $table->string('lastname',250)->nullable();
            
            $table->integer('PERS_ID')->unsigned();
            $table->foreign('PERS_ID')->references('PERS_MAT_95')->on('personnels')->softDeletes();


            $table->integer('natureconge')->unsigned();
            $table->foreign('natureconge')->references('CODE')->on('nature_conges')->softDeletes();
            

            // $table->string('natureagent',250)->nullable();
            // $table->string('direction',250)->nullable();
            $table->date('debut')->nullable();
            $table->string('debutX',250)->nullable();
            $table->date('fin')->nullable();
            $table->string('finx',250)->nullable();
            $table->string('adresse',250)->nullable();
            $table->integer('tel')->nullable();
            $table->integer('nbrjour')->nullable();
            $table->string('pdf',250)->nullable();
            $table->string('uuid',250)->nullable();
            $table->string('pdfuid',250)->nullable();
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
        Schema::dropIfExists('demandeconges');
    }
};
