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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('office_name')->nullable();
            $table->string('logo')->nullable();
            $table->date('start_year')->nullable();
            $table->date('leave_year')->nullable();
            $table->boolean('is_running')->default(false);
            $table->string('position')->nullable();
            $table->longText('description')->nullable();
            $table->string('website_url')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
