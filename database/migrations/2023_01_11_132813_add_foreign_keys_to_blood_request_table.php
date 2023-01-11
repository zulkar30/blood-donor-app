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
        Schema::table('blood_request', function (Blueprint $table) {
            $table->foreignId('doctor_id', 'fk_blood_request_to_doctor')
            ->references('id')->on('doctor')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('officer_id', 'fk_blood_request_to_officer')
            ->references('id')->on('officer')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('patient_id', 'fk_blood_request_to_patient')
            ->references('id')->on('patient')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blood_request', function (Blueprint $table) {
            $table->dropForeign('fk_blood_request_to_doctor');
            $table->dropForeign('fk_blood_request_to_officer');
            $table->dropForeign('fk_blood_request_to_patient');
        });
    }
};
