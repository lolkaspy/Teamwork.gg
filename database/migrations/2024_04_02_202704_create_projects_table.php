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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->timestamp('ended_at')->nullable();
            $table->string('photo')->default('static/images/project_placeholder.png');

            $table->unsignedBigInteger('age_limit_id');
            $table->foreign('age_limit_id', 'age_limit_project_fk')->on('age_limits')->references('id');

            $table->unsignedBigInteger('format_id');
            $table->foreign('format_id', 'format_project_fk')->on('formats')->references('id');

            $table->timestamps();
            $table->tinyInteger('state')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
