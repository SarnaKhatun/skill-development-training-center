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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('weekdays');
            $table->integer('total_sit');
            $table->integer('status')->default(1)->comment('0=>inactive,1=>active');
            $table->string('description', 550)->nullable();
            $table->integer('branch_id')->contrained('branches')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
