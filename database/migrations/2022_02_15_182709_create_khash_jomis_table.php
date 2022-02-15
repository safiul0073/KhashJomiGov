<?php

use App\Models\Union;
use App\Models\UpaZila;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhashJomisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khash_jomis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(UpaZila::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Union::class)->constrained()->onDelete('cascade');
            $table->string('mowja');
            $table->string('j_l_no')->nullable();
            $table->string('khotian_no')->nullable();
            $table->longText('dag_nos')->nullable();
            $table->longText('quantitys')->nullable();
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
        Schema::dropIfExists('khash_jomis');
    }
}
