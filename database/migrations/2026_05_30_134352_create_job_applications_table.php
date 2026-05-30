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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('vacancy_id')
                ->nullable()
                ->constrained('vacancies')
                ->nullOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number', 20);
            $table->string('file');
            $table->text('why_hire_you')->nullable();
            $table->boolean('is_agreed')->default(false);
            $table->enum('application_type', [
                'free_vacancy_application',
                'open_application'
            ]);

            // Interested Job Position
            $table->string('interested_position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
