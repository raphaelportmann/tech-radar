<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technology_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technology_id');
            $table->string('name');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('description', 1000);
            $table->string('description_classification', 1000)->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technology_histories');
    }
}
