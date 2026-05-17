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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->string('menu_name_en');
            $table->string('menu_name_ne')->nullable();

            $table->string('page_template')->nullable();
            $table->integer('position')->default(0);

            $table->enum('is_main_child', ['child_menu', 'parent_menu'])->default('parent_menu');

            $table
                ->foreignId('parent_id')
                ->nullable()
                ->constrained('menus')
                ->onDelete('cascade');

            $table->enum('menu_location', ['header', 'footer', 'header_footer', 'useful_links'])->default('header');

            $table->string('image')->nullable();

            $table->string('page_title_en')->nullable();
            $table->string('page_title_ne')->nullable();

            $table->string('slug')->unique()->nullable();

            $table->longText('content_en')->nullable();
            $table->longText('content_ne')->nullable();

            $table->longText('description_en')->nullable();
            $table->longText('description_ne')->nullable();

            $table->string('external_link')->nullable();

            $table->string('meta_title_en')->nullable();

            $table->string('meta_keywords_en')->nullable();

            $table->text('meta_description_en')->nullable();

            $table->string('canonical_url')->nullable();

            $table->string('og_title_en')->nullable();

            $table->text('og_description_en')->nullable();

            $table->string('og_image')->nullable();

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
        Schema::dropIfExists('menus');
    }
};
