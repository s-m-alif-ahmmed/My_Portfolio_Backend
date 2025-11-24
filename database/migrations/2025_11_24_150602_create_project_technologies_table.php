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
        Schema::create('project_technologies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('technology_id');
            $table->timestamps();

            // When a product is deleted, remove the pivot row
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade'); // delete pivot rows if product deleted

            // When a technology is deleted, remove the pivot row
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->onDelete('cascade'); // delete pivot rows if technology deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technologies');
    }
};
