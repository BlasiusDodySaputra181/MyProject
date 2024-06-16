<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('linkwebsite');
            $table->integer('divisions_id',false,true);
            $table->foreign('divisions_id')->references('id')->on('divisions')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('subdivisions_id',false,true)->nullable();
            $table->foreign('subdivisions_id')->references('id')->on('subdivisions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('websites');
    }
}
