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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('bootstrap_icon')->nullable();

            $table->string('title_en');
            $table->string('title_ne')->nullable();

            $table->text('description_en')->nullable();
            $table->text('description_ne')->nullable();

            $table->integer('position')->default(0);
            $table->boolean('is_active')->default(true);

            $table->enum('type', ['features_offer', 'services_offer']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
