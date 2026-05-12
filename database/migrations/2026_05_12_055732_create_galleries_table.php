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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')
                ->constrained('albums')
                ->cascadeOnDelete();

            $table->string('title_en')->nullable();
            $table->string('title_ne')->nullable();

            $table->text('description_en')->nullable();
            $table->text('description_ne')->nullable();

            $table->string('image');

            $table->boolean('is_active')->default(true);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
