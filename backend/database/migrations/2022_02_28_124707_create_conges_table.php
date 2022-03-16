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
        Schema::create('conges', function (Blueprint $table) {
            $table->Increments('CONG_MAT_95');
            $table->integer('CONG_NUMORD_93')->nullable();
            $table->integer('CONG_NAT_9')->nullable();
            $table->string('CONG_MOTIF_X40',40)->nullable();
            $table->integer('CONG_CET_9')->nullable();
            $table->integer('CONG_ANCSOLD_93')->nullable();
            $table->integer('CONG_NBRJOUR_93')->nullable();
            $table->integer('CONG_NOVSOLD_93')->nullable();
            $table->date('CONG_DATE_DEB')->nullable();
            $table->string('CONG_PERDEB_X',1)->nullable();
            $table->date('CONG_DATE_FIN')->nullable();
            $table->string('CONG_PERFIN_X',1)->nullable();
            $table->string('CONG_INTERIM_X20',30)->nullable();
            $table->string('CONG_ADRES_X30',65)->nullable();
            $table->string('CONG_TEL_98',8)->nullable();
            $table->string('CONG_DEMI_PER',8)->nullable();
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
        Schema::dropIfExists('conges');
    }
};
