<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->enum('interview_type', ['internal', 'external'])->nullable()->after('status');
            $table->text('interview_instructions')->nullable()->after('interview_type');
            $table->timestamp('interview_date')->nullable()->after('interview_instructions');
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['interview_type', 'interview_instructions', 'interview_date']);
        });
    }
};
