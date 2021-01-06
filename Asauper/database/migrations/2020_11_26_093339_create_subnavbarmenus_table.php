<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSubnavbarmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnavbarmenus', function (Blueprint $table) {
            $table->id();
            $table->string('navbar_name');
            $table->unsignedBigInteger('navbarmenuitem_id');
            $table->string('navbar_link');
            $table->string('status');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('navbarmenuitem_id')->references('id')->on('navbarmenuitems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subnavbarmenus');
    }
}
