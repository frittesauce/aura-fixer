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
        Schema::create('active_sessions', function (Blueprint $table) {
            $table->char("token", 64);
            $table->integer("user_id", false, true);
            $table->timestamp("expire", 0);
        });       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
