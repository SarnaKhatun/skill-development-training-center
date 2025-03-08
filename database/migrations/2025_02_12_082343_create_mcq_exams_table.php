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
        Schema::create('mcq_exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->string('batch_id')->index();
            $table->bigInteger('course_id');
            $table->string('exam_title');
            $table->integer('total_mark');
            $table->string('time');
            $table->string('date');
            $table->string('created_by');
            $table->tinyInteger('status')->default(0)->comment('1=>Active, 2=>Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcq_exams');
    }
};
