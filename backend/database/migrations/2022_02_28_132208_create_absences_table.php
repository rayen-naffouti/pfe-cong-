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
        Schema::create('absences', function (Blueprint $table) {
            $table->Increments('ABS_MAT_95');
            
            $table->integer('ABS_NUMORD_93')->unsigned();
            $table->foreign('ABS_NUMORD_93')->references('PERS_MAT_95')->on('personnels')->onDelete('restrict')->onUpdate('restrict');

            $table->integer('ABS_NAT_9')->unsigned();
            $table->foreign('ABS_NAT_9')->references('CODE_ABS')->on('natabses')->onDelete('restrict')->onUpdate('restrict');
            
            $table->integer('ABS_CAT_9');
            $table->date('ABS_DATE_DEB');
            $table->enum('ABS_PERDEB_X', ['A', 'P']);
            $table->date('ABS_DATE_FIN');
            $table->enum('ABS_PERFIN_X', ['A', 'P']);
            $table->integer('ABS_NBRJOUR_93');
            $table->integer('ABS_CUMULE_9');
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
        Schema::dropIfExists('absences');
    }
};
