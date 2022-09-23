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
        Schema::create('sub_lines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('descrip');
            $table->text('image');
            $table->unsignedBigInteger('stateitem');
            $table->unsignedBigInteger('lineid');
            $table->timestamps();
            $table->foreign('stateitem')->references('id')->on('state_items');
            $table->foreign('lineid')->references('id')->on('lines');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_lines');
    }
};
