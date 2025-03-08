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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->string('header_title');
            $table->string('title');
            $table->integer('course_id')->contrained('courses')->onDelete('cascade');
            $table->integer('type')->comment('0=>no_video,1=>youtube_link,2=>upload_video')->nullable()->default(0);
            $table->string('url_video')->nullable();
            $table->string('upload_video')->nullable();
            $table->string('pdf')->nullable();
            $table->string('priority')->nullable();
            $table->integer('status')->default(1);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_details');
    }
};
