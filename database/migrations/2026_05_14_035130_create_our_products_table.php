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
        Schema::create('our_products', function (Blueprint $table) {
            $table->id();

            $table->string('badge_title_en');
            $table->string('badge_title_ne')->nullable();


            $table->string('title_en');
            $table->string('title_ne')->nullable();


            $table->string('image')->nullable();


            $table->longText('description_en')->nullable();
            $table->longText('description_ne')->nullable();


            $table->string('glass_text_en')->nullable();
            $table->string('glass_text_ne')->nullable();


            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_products');
    }
};
