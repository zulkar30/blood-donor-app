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
        Schema::table('crossmatch', function (Blueprint $table) {
            $table->foreignId('officer_id', 'fk_crossmatch_to_officer')
            ->references('id')->on('officer')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crossmatch', function (Blueprint $table) {
            $table->dropForeign('fk_crossmatch_to_officer');
        });
    }
};
