<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accept_id');
            $table->unsignedBigInteger('send_id');
            $table->unsignedBigInteger('bondobosto_app_id');
            $table->tinyInteger('status')->comment('0=not passed', '1=passed')->default(0);
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
        Schema::dropIfExists('app_roles');
    }
}
