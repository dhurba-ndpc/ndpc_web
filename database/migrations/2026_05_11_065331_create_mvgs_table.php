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
        Schema::create('mvgs', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_np')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->string('subtitle_np')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_np')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            // Sorting
            $table->integer('position')->default(0);
             $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvgs');
    }
};
