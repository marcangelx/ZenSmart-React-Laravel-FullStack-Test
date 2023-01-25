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
        Schema::create('tally_history', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->unsignedBigInteger('tally_id');
            $table->timestamps();
            $table->foreign('tally_id')->references('id')->on('button_clicks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tally_history');
    }
};
