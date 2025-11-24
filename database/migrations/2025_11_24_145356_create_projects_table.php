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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id')->nullable();
            $table->string('office_name')->nullable();
            $table->string('office_logo')->nullable();
            $table->string('office_web_url')->nullable();
            $table->string('client_source')->nullable();
            $table->string('client_name')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->string('short_description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_office_project')->default(false);
            $table->boolean('is_complete')->default(false);
            $table->string('role')->nullable();
            $table->longText('challenges')->nullable();
            $table->longText('solutions')->nullable();
            $table->string('website_url')->nullable();
            $table->string('admin_dashboard_url')->nullable();
            $table->string('google_play_store_url')->nullable();
            $table->string('apple_store_url')->nullable();
            $table->string('api_documentation_url')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();

            // Foreign key: if experience is deleted, set office_id to NULL
            $table->foreign('office_id')
                ->references('id')
                ->on('experiences')
                ->nullOnDelete(); // sets office_id to null if experience deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
