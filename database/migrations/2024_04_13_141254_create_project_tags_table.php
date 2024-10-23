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
        Schema::create('project_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_tags_project_fk')->on('projects')->references('id');
            $table->index('project_id', 'project_tags_project_idx');

            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'project_tags_tag_fk')->on('tags')->references('id');
            $table->index('tag_id', 'project_tags_tag_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_tags');
    }
};
