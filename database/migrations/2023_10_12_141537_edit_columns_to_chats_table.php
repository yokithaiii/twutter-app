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
        Schema::table('chats', function (Blueprint $table) {
            $table->renameColumn('user_1_id', 'user_me_id');
            $table->renameColumn('user_2_id', 'user_to_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->renameColumn('user_me_id', 'user_1_id');
            $table->renameColumn('user_to_id', 'user_2_id');
        });
    }
};
