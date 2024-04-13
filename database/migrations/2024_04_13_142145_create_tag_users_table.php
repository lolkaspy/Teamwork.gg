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
        Schema::create('tag_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'tag_user_user_fk')->on('users')->references('id');
            $table->index('user_id', 'tag_user_user_idx');

            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'tag_user_tag_fk')->on('tags')->references('id');
            $table->index('tag_id', 'tag_user_tag_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_users');
    }
};
