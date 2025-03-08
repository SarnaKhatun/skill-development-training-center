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
        Schema::create('near_by_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->bigInteger('district_id');
            $table->bigInteger('upazilla_id');
            $table->string('address');
            $table->text('message');
            $table->bigInteger('branch_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('near_by_requests');
    }
};
