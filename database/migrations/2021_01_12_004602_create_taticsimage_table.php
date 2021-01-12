<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaticsimageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taticsimage', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('imagename');
            $table->string('imagelink');
            $table->unsignedBigInteger('tatic_id');
            $table->foreign('tatic_id')->references('id')->on('tatics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taticsimage');
    }
}
