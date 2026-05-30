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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            // Address
            $table->string('address_en')->nullable();
            $table->string('address_ne')->nullable();

            // Phones
            $table->string('phone_1', 30)->nullable();
            $table->string('phone_2', 30)->nullable();

            // Mobile Numbers
            $table->string('mobile_no_1', 30)->nullable();
            $table->string('mobile_no_2', 30)->nullable();

            // Zip Code
            $table->string('zipcode', 20)->nullable();

            // Connect With Us Message
            $table->text('connect_short_message_en')->nullable();
            $table->text('connect_short_message_ne')->nullable();

            // Google Map
            $table->text('google_map')->nullable();

            // Social Links
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('youtube_link')->nullable();

            // Email
            $table->string('email')->nullable();

            // Information Officer
            $table->string('image')->nullable();
            $table->string('information_officer_name_en')->nullable();
            $table->string('information_officer_name_ne')->nullable();

            $table->string('information_officer_contact_no', 30)->nullable();
            $table->string('information_officer_email')->nullable();

            // Footer Description
            $table->text('footer_short_description_en')->nullable();
            $table->text('footer_short_description_ne')->nullable();

            // Logos
            $table->string('logo_1')->nullable();
            $table->string('logo_2')->nullable();

            // Status
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
