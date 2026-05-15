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
        Schema::create('promotion_messages', function (Blueprint $table) {
            $table->id();
            $table->string('badge_title_en')->nullable();
            $table->string('badge_title_ne')->nullable();

            $table->string('title_en');
            $table->string('title_ne')->nullable();

            $table->text('short_description_en')->nullable();
            $table->text('short_description_ne')->nullable();

            $table->string('google_play_store_link')->nullable();
            $table->string('app_store_link')->nullable();

            $table->enum('type', ['app_link', 'promotion_text']);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_messages');
    }
};
