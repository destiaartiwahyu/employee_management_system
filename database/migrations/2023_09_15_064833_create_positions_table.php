<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('position_id');
            $table->timestamps();
            $table->string('name');
            $table->integer('salary');
            $table->enum('level', ['intern', 'junior', 'mid', 'senior'])->default('mid');
            $table->text('description')->nullable();
            $table->foreignId('division_position_id')->references('division_id')->on('divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
