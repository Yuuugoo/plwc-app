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
        Schema::create('new_friends', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('introduction_content')->nullable();
            $table->string('friend_avatar')->nullable();
            $table->string('grade_level')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_friends');
    }
};
