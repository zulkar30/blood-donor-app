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
        Schema::table('blood_donor', function (Blueprint $table) {
            $table->foreignId('officer_id', 'fk_blood_donor_to_officer')->references('id')->on('officer')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blood_donor', function (Blueprint $table) {
            $table->dropForeign('fk_blood_donor_to_officer');
        });
    }
};
