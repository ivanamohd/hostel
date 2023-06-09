<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('contact');
            $table->string('category');
            $table->longText('description');
            $table->string('priority', 20);
            $table->string('status');
            $table->string('assign')->nullable();
            $table->string('hostel');
            $table->string('block')->nullable();
            $table->string('floor')->nullable();
            $table->string('room')->nullable();
            $table->string('evidence')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
