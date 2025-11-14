<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company_name');
            $table->text('description');
            $table->text('requirements');
            $table->text('benefits')->nullable();
            $table->string('job_type'); // Full Time, Part Time, Remote, etc.
            $table->string('category'); // IT, Finance, Healthcare, etc.
            $table->string('location');
            $table->string('experience_level'); // Entry, Mid, Senior
            $table->date('deadline');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_postings');
    }
};
