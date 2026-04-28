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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            
            $table->string('badge_text_en');
            $table->string('title_en');
            $table->text('description_en');  

            
            $table->string('badge_text_ne');
            $table->string('title_ne');
            $table->text('description_ne'); 

          
            $table->string('glass_text')->nullable();
            $table->string('image');

          
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
