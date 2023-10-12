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
        Schema::table('post_user_likes', function (Blueprint $table) {
            $table->text('user_name')->nullable()->after('user_id');
            $table->text('user_avatar')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_user_likes', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('user_avatar');
        });
    }
};
