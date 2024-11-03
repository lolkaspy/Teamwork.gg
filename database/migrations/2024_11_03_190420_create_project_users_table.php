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
        Schema::create('project_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'project_users_user_fk')->on('users')->references('id');
            $table->index('user_id', 'project_users_user_idx');

            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_users_project_fk')->on('projects')->references('id');
            $table->index('project_id', 'project_users_project_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_users');
    }
};
