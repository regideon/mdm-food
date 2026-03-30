<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requested_by');
            $table->foreign('requested_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('id_generator')->unique();
            $table->string('tracking_number')->nullable();
            $table->string('code')->unique();
            $table->dateTime('requested_at')->nullable();

            // Basic Info
            $table->text('description')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_lead')->nullable();
            $table->string('quality_control')->nullable();
            $table->string('brand')->nullable();
            $table->string('launch_type')->nullable();
            $table->json('data_types')->nullable();
            $table->json('channel_coverage')->nullable();
            $table->date('launch_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('launch_date_checker')->nullable();

            // Repeater tabs
            $table->json('menu_details')->nullable();
            $table->json('pilot_stores')->nullable();
            $table->json('pp_marketing_campaign')->nullable();
            $table->json('regular_bom')->nullable();
            $table->json('combo_bom_items')->nullable();
            $table->json('product_hierarchy_items')->nullable();
            $table->json('mis_items')->nullable();
            $table->json('dsmr_items')->nullable();
            $table->json('dual_screens')->nullable();

            $table->json('bom_screenshot')->nullable();

            // Approval
            $table->unsignedTinyInteger('current_step')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purves');
    }
};
