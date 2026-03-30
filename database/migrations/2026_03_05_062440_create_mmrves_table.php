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
        Schema::create('mmrves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requested_by');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('code')->unique();
            $table->string('material_code')->unique();
            $table->dateTime('requested_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mmrves');
    }
};
