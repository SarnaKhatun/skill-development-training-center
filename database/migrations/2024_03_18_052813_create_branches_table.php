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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('question_make_permission')->default(0)->comment('1=> Allowed, 0=Denied');
            $table->string('image')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('upazilla_id')->nullable();
            $table->string('post_office')->nullable();
            $table->string('address')->nullable();
            $table->string('center_code')->nullable();
            $table->string('institute_name_en')->nullable();
            $table->string('institute_name_bn')->nullable();
            $table->string('institute_age')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->integer('institute_division')->nullable();
            $table->integer('institute_district')->nullable();
            $table->integer('institute_upazilla')->nullable();
            $table->string('institute_post_code')->nullable();
            $table->string('institute_address')->nullable();
            $table->string('nid_card_img')->nullable();
            $table->string('trade_licence_img')->nullable();
            $table->string('signature_img')->nullable();
            $table->string('registration_balance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
