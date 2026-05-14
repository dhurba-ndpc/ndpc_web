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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name_en');
            $table->string('name_ne')->nullable();
            $table->string('designation_en')->nullable();
            $table->string('designation_ne')->nullable();

            // eg: Chairman, Member, Managing Director
            $table->string('position_en')->nullable();
            $table->string('position_ne')->nullable();

            // eg: Nepal Telecom, Rbb
            $table->string('organization_involvement_en')->nullable();
            $table->string('organization_involvement_ne')->nullable();

            // separating Leading Team and Board of Directors
            $table->enum('type', ['leading_team', 'board_of_directors']);

            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('team_members');
    }
};
