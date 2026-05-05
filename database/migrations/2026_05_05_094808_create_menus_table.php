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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_name');
            $table->string('page_template')->nullable();
            $table->integer('position')->default(0);
            $table->enum('is_main_child', ['child_menu', 'parent_menu'])->default('parent_menu');
            $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade');
            $table->enum('menu_location', ['header', 'footer', 'header_footer', 'useful_links'])->default('header');
            $table->boolean('is_active')->default(true);
            $table->string('banner_image')->nullable();
            $table->string('image')->nullable();
            $table->string('page_title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->longText('content')->nullable();
            $table->longText('description')->nullable();
            $table->string('external_link')->nullable();
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
