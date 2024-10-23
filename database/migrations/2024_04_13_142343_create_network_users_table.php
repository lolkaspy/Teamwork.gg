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
        Schema::create('network_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'network_users_user_fk')->on('users')->references('id');
            $table->index('user_id', 'network_users_user_idx');

            $table->unsignedBigInteger('network_id');
            $table->foreign('network_id', 'network_users_network_fk')->on('networks')->references('id');
            $table->index('network_id', 'network_users_network_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_users');
    }
};
