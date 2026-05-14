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
        Schema::create('employee_quarters', function (Blueprint $table) {
            $table->id();
            $table->string('employee_quarter_title_en');
            $table->string('employee_quarter_title_ne')->nullable();

            $table->string('image')->nullable();

            $table->string('name_en');
            $table->string('name_ne')->nullable();

            $table->string('designation_en')->nullable();
            $table->string('designation_ne')->nullable();

            // quarter only 1,2,3,4
            $table->enum('quarter', ['1', '2', '3', '4']);

            // example: 2082/83
            $table->string('year');

            $table->text('description_en');
            $table->text('description_ne')->nullable();

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
        Schema::dropIfExists('employee_quarters');
    }
};
