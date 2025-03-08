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
        Schema::create('recharge_s_m_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_sms');
            $table->double('received_amount');
            $table->double('amount');
            $table->double('charge');
            $table->integer('method_id');
            $table->string('trx')->nullable();
            $table->date('payment_date');
            $table->bigInteger('branch_id');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recharge_s_m_s');
    }
};
