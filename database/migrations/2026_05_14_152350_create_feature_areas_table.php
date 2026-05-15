<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feature_areas', function (Blueprint $table) {
            $table->id();

            // Type
            $table->enum('type', ['mvg', 'dark_banner']);

            // Title
            $table->string('title_en')->nullable();
            $table->string('title_ne')->nullable();

            // Subtitle
            $table->string('subtitle_en')->nullable();
            $table->string('subtitle_ne')->nullable();

            // Description
            $table->longText('description_en')->nullable();
            $table->longText('description_ne')->nullable();

            // Image
            $table->string('image')->nullable();

            // Position
            $table->integer('position')->default(0);

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_areas');
    }
};
