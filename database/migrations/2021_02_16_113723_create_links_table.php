<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title')->default('Betaka');
            $table->string('link')->default('https://www.google.com/');
//            $table->string('link')->unique();
            $table->integer('views')->default(0);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->date('startDate')->nullable();
            $table->date('finishDate')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
