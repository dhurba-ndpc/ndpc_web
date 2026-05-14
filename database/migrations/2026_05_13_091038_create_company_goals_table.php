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
        Schema::create('company_goals', function (Blueprint $table) {
            $table->id();
            $table->string('badge_title_en')->nullable();
            $table->string('badge_title_ne')->nullable();

            $table->text('description_en');
            $table->text('description_ne')->nullable();

            $table->string('image')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_goals');
    }
};
