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
        Schema::create('crossmatch', function (Blueprint $table) {
            $table->id();
            $table->string('blood_type')->nullable();
            $table->string('fase1')->nullable();
            $table->string('fase2')->nullable();
            $table->string('fase3')->nullable();
            $table->string('result')->nullable();
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
        Schema::dropIfExists('crossmatch');
    }
};
