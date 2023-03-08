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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->string('username');
            $table->string('url');
            $table->dateTime('last_access');
            $table->timestamps();
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('type_id')
                ->references('id')
                ->on('profile_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
