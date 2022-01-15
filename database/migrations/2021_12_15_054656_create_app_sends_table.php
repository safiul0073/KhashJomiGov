<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_sends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bondobosto_app_id');
            $table->unsignedBigInteger('accept_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->string('file')->nullable();
            $table->string('openion')->nullable();
            $table->longText('montobbo')->nullable();
            $table->longText('onucched')->nullable();
            $table->longText('adesh')->nullable();
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
        Schema::dropIfExists('app_sends');
    }
}
