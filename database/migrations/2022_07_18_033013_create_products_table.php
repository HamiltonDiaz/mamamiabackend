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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descrip');
            $table->text('image');
            $table->double('price');
            $table->unsignedBigInteger('stateitem');
            $table->unsignedBigInteger('sublineid');
            $table->timestamps();
            $table->foreign('stateitem')->references('id')->on('state_items');
            $table->foreign('sublineid')->references('id')->on('sub_lines');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
