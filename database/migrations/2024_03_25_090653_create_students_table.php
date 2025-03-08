<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('image')->nullable();
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('email');
            $table->string('phone');
            $table->string('gurdian_phone');
            $table->string('present_address');
            $table->string('premanent_address');
            $table->string('dob');
            $table->string('blood_group')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender');
            $table->string('religion');
            $table->string('document_image')->nullable();
            $table->integer('exam_id');
            $table->integer('board_id');
            $table->string('roll');
            $table->string('password');
            $table->string('registration');
            $table->string('exam_year');
            $table->string('admission_date');
            $table->integer('session_id');
            $table->string('session_start');
            $table->string('session_end');
            $table->integer('course_id');
            $table->integer('batch_id');
            $table->string('admission_fee');
            $table->string('discount')->nullable();
            $table->string('payable_amount');
            $table->string('paid')->nullable();
            $table->string('due')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 = Not Downloaded Certificate, 1 = Downloaded Certificate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
