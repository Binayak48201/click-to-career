<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('slug')->unique()->nullable();
            $table->string('title');
            $table->longText('body');
            $table->unsignedInteger('visits')->default(0);
            $table->timestamps();
            $table->foreign('category_id')
               ->references('id')
               ->on('categories')
               ->onDelete('CASCADE');
            $table->foreign('user_id')
               ->references('id')
               ->on('users')
               ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forums');
    }
};
