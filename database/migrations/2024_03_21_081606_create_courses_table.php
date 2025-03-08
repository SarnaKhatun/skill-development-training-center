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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->integer('priority');
            $table->double('course_fee');
            $table->integer('discount')->nullable();
            $table->double('discount_fee')->nullable()->default(0);
            $table->integer('total_video')->nullable()->default(0);
            $table->integer('total_hours')->nullable()->default(0);
            $table->integer('total_sheet')->nullable()->default(0);
            $table->integer('total_mcq')->nullable()->default(0) ;
            $table->integer('teacher_id')->default(0)->nullable();
            $table->integer('course_view')->default(1)->comment('0=>offline,1=>online')->nullable();
            $table->integer('course_type')->default(1)->comment('0=>unpaid,1=>paid');
            $table->integer('status')->default(1)->comment('0=>inactive,1=>active');
            $table->string('description', 3000)->nullable();
            $table->integer('branch_id')->default(0)->nullable()->contrained('branches')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
