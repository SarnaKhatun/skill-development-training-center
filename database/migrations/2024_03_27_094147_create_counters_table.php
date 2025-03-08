<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('count_o1');
            $table->string('count_o2');
            $table->string('count_o3');
            $table->string('count_o4');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
