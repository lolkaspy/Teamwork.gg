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
        Schema::create('role_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'role_users_user_fk')->on('users')->references('id');
            $table->index('user_id', 'role_users_user_idx');

            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_users_role_fk')->on('roles')->references('id');
            $table->index('role_id', 'role_users_role_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_users');
    }
};
