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
        Schema::table('messages', function (Blueprint $table) {
            $table->text('room_id')->nullable();
            $table->text('user_id_sender')->nullable();
            $table->text('user_id_receiver')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('room_id');
            $table->dropColumn('user_id_sender');
            $table->dropColumn('user_id_receiver');
        });
    }
};
