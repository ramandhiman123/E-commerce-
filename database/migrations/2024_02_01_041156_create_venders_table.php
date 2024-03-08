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
        Schema::create('venders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('mobile_no');
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('gst_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venders');
    }
};
