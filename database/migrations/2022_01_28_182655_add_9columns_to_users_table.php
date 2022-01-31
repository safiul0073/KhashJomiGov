<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add9columnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bondobosto_apps', function (Blueprint $table) {
            $table->longText('dorkhastokarir_khash_jomir_biboron')->nullable();
            $table->longText('khashjomipower_karon')->nullable();
            $table->longText('mowjar_name_somuho')->nullable();
            $table->longText('duijon_baktir_nam_tikana')->nullable();
            $table->longText('shopoth_namar_baktir_name')->nullable();
            $table->longText('shopoth_nama_parents_name')->nullable();
            $table->longText('dorkhastokarir_tipshoi')->nullable();
            $table->longText('shonaktokarir_tipshoi')->nullable();
            $table->string('poron_kari_name')->nullable();
            $table->string('puron_karir_girdian')->nullable();
            $table->string('puron_karir_podobi')->nullable();
            $table->longText('purun_karir_address')->nullable();
            $table->date('dorkhasto_praptir_tarik')->nullable();
            $table->string('praptir_kromic_no')->nullable();
            $table->string('praptir_roshid_kromik_no')->nullable();
            $table->string('praptir_somoy')->nullable();
            $table->string('vumi_rajossho_office_shakkor')->nullable();
            $table->string('rajossho_kormokorter_sakkhor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bondobosto_apps', function (Blueprint $table) {
            //
        });
    }
}
