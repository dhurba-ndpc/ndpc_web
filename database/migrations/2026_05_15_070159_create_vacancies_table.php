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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ne')->nullable();

            $table->string('slug')->unique();

            $table->string('location')->nullable();

            $table->enum('employment_type', [
                'full_time',
                'part_time',
                'remote',
                'hybrid',
                'contract',
                'internship'
            ])->default('full_time');

            $table->text('short_description_en')->nullable();
            $table->text('short_description_ne')->nullable();

            $table->longText('description_en')->nullable();
            $table->longText('description_ne')->nullable();

            $table->string('salary')->nullable();

            $table->string('experience_level')->nullable();

            $table->unsignedInteger('total_applicants')->default(0);

            $table->date('deadline')->nullable();

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
        Schema::dropIfExists('vacancies');
    }
};
