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
        Schema::create('technology_solution_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technology_solution_category_id');
            $table
                ->foreign(
                    'technology_solution_category_id',
                    'tech_solution_cat_fk'
                )
                ->references('id')
                ->on('technology_solution_categories')
                ->cascadeOnDelete();

            $table->string('title_en');
            $table->string('title_ne')->nullable();

            $table->text('short_description_en')->nullable();
            $table->text('short_description_ne')->nullable();

            $table->string('use_case_title_en')->default('USE CASE');
            $table->string('use_case_title_ne')->nullable();

            $table->longText('use_case_description_en')->nullable();
            $table->longText('use_case_description_ne')->nullable();

            $table->string('stat_one_value')->nullable();
            $table->string('stat_one_label_en')->nullable();
            $table->string('stat_one_label_ne')->nullable();

            $table->string('stat_two_value')->nullable();
            $table->string('stat_two_label_en')->nullable();
            $table->string('stat_two_label_ne')->nullable();

            $table->string('stat_three_value')->nullable();
            $table->string('stat_three_label_en')->nullable();
            $table->string('stat_three_label_ne')->nullable();

            $table->string('stat_four_value')->nullable();
            $table->string('stat_four_label_en')->nullable();
            $table->string('stat_four_label_ne')->nullable();

            $table->string('image')->nullable();

            $table->string('glass_text_en')->nullable();
            $table->string('glass_text_ne')->nullable();

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
        Schema::dropIfExists('technology_solution_items');
    }
};
