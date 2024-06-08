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
        Schema::create('users', function(Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('usernameL');
            $table->string('password');
            $table->string('bucks', 1000);
            $table->string('bits', 1000);
            $table->string('email');
            $table->string('regIPHash');
            $table->string('logIPHash');
            $table->integer('primaryClan');
            $table->integer('power');
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
