<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->timestamp('read_at')->nullable()->after('message');
        });

        Schema::table('job_applications', function (Blueprint $table) {
            $table->timestamp('read_at')->nullable()->after('interested_position');
        });

        Schema::create('outbound_message_logs', function (Blueprint $table) {
            $table->id();
            $table->string('message_type', 50);
            $table->string('source_type', 50);
            $table->unsignedBigInteger('source_id');
            $table->string('recipient_name')->nullable();
            $table->string('recipient_email');
            $table->string('subject');
            $table->text('message');
            $table->foreignId('sent_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outbound_message_logs');

        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn('read_at');
        });

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn('read_at');
        });
    }
};
