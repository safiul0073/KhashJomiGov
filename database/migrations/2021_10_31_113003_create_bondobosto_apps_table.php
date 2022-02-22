<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBondobostoAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bondobosto_apps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upa_zila_id');
            $table->unsignedBigInteger('union_id');
            $table->string('app_class');
            $table->string('avater')->nullable();
            $table->string('vumihi_muktijudda_sonod')->nullable();
            $table->string('vumihi_commission_sonod')->nullable();
            $table->string('vumihin_others_sonod')->nullable();
            $table->string('main_name')->nullable();
            $table->string('main_age')->nullable();
            $table->string('main_fathers_name')->nullable();
            $table->string('main_fathers_mortal')->nullable();
            $table->string('main_village')->nullable();
            $table->string('main_zila')->nullable();
            $table->string('main_f_or_m_name')->nullable();
            $table->string('main_f_or_m_age')->nullable();
            $table->string('shodosso_names')->nullable();
            $table->string('shodosso_ages')->nullable();
            $table->string('shodosso_relations')->nullable();
            $table->string('shodosso_whatdos')->nullable();
            $table->string('shodosso_comments')->nullable();
            $table->longText('dorkhastokarir_barir_biboron')->nullable();
            $table->longText('dorkhastokarir_present_biboron')->nullable();
            $table->longText('dorkhastokarir_khas_jomir_biboron')->nullable();
            $table->longText('dorkhastokarir_khas_dakhil_biboron')->nullable();
            $table->longText('dorkhastokarir_nodi_vangon_biborn')->nullable();
            $table->longText('dorkhastokarir_shohidorpongo_person_biboron')->nullable();
            $table->longText('dorkhastokarir_khash_jomir_biboron')->nullable();
            $table->longText('khashjomipower_karon')->nullable();
            $table->longText('mowjar_name_somuho')->nullable();
            $table->longText('duijon_baktir_nam_tikana')->nullable();
            $table->string('shopoth_namar_baktir_name')->nullable();
            $table->string('shopoth_nama_parents_name')->nullable();
            $table->string('dorkhastokarir_tipshoi')->nullable();
            $table->string('shonaktokarir_tipshoi')->nullable();
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
            $table->tinyInteger('status')->comment('not checked == 0 or checked ==1 then passed=2')->default(0);
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
        Schema::dropIfExists('bondobosto_apps');
    }
}