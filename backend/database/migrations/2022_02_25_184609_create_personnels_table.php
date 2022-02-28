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
        Schema::create('personnels', function (Blueprint $table) {
            $table->Increments('PERS_MAT_95');
            $table->integer('PERS_MAT_ACT');
            $table->integer('PERS_NUMASS_94')->nullable();
            $table->string('PERS_NATURAGENT_93',40)->nullable();
            $table->integer('PERS_CODFONC_92')->nullable();
            $table->integer('PERS_CODGROUP_92')->nullable();
            $table->integer('PERS_CET_9')->nullable();
            $table->string('PERS_NOM_X40',250)->nullable();
            $table->string('PERS_NOM',100)->nullable();
            $table->string('PERS_PRENOM',100)->nullable();
            $table->string('EMAIL',200)->nullable();
            $table->enum('PERS_SEX_X', ['F', 'H'])->nullable();
            $table->string('PERS_ETACIVIL_X',1)->nullable();
            $table->string('PERS_NJFILLE_X20',20)->nullable();
            $table->string('PERS_CODECHEFFAMIL_X',1)->nullable();
            $table->integer('PERS_ENFANT_92')->nullable();
            $table->integer('PERS_ENFSOC_9')->nullable();
            $table->integer('PERS_ENFISC_9')->nullable();
            $table->date('PERS_DATE_NAIS')->nullable();
            $table->string('PERS_LNAIS_X16',16)->nullable();
            $table->string('PERS_PIDENTNUM_X13',13)->nullable();
            $table->date('PERS_PIDENT_DATE_EMIS')->nullable();
            $table->string('PERS_PIDENTLEMIS_X12',12)->nullable();
            $table->string('PERS_ADR_X60',250)->nullable();
            $table->integer('PERS_TEL_98')->nullable();
            $table->integer('PERS_CONDLOGE_9')->nullable();
            $table->string('PERS_NATION_X16',16)->nullable();		
            $table->string('PERS_GSANG_X3',3)->nullable();
            $table->integer('PERS_MONTALLFAM_95')->nullable();
            $table->integer('PERS_MONTSALUNIQ_95')->nullable();
            $table->string('PERS_NOMCONJ_X40',40)->nullable();
            $table->date('PERS_DATE_NAISCONJ')->nullable();
            $table->string('PERS_LNAISCONJ_X16',16)->nullable();
            $table->string('PERS_NATIONCONJ_X16',16)->nullable();
            $table->string('PERS_PROFCONJ_X25',25)->nullable();
            $table->string('PERS_EMPLCONJ_X30',30)->nullable();
            $table->integer('PERS_NUMLETREC_95')->nullable();
            $table->date('PERS_DATE_LETREC')->nullable();
            $table->date('PERS_DATE_REC')->nullable();
            $table->integer('PERS_ECHELREC_92')->nullable();
            $table->string('PERS_CLASREC_X',1)->nullable();
            $table->integer('PERS_CHELONREC_92')->nullable();
            $table->date('PERS_DATE_CONF')->nullable();
            $table->string('PERS_CLASCONF_X',1)->nullable();
            $table->date('PERS_DATE_EFECHCONF')->nullable();
            $table->integer('PERS_ECHELCONF_92')->nullable();
            $table->string('PERS_QUALIF_X45',45)->nullable();
            $table->string('PERS_NUMCNSS_X16',16)->nullable();
            $table->string('PERS_NUMCNR_X10',20)->nullable();
            $table->integer('PERS_SITAGEN_9')->nullable();
            $table->integer('PERS_CATPERS_9')->nullable();
            $table->integer('PERS_NATPERS_9')->nullable();
            $table->string('PERS_AFFECT_92',2)->nullable();
            $table->string('PERS_CENTRECOUT_94',5)->nullable();
            $table->integer('PERS_ORDING_9')->nullable();
            $table->integer('PERS_CODPAI_9')->nullable();
            $table->integer('PERS_EXPERTISE_92')->nullable();
            $table->integer('PERS_NUMCOMPT_X15')->nullable();
            $table->integer('PERS_CODBANK_92')->nullable();
            $table->integer('PERS_CODAGENC_93')->nullable();
            $table->integer('PERS_SALBASE_96')->nullable();    
				

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
        Schema::dropIfExists('personnels');
    }
};
