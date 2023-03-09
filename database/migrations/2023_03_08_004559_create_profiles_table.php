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
            $table->unsignedBigInteger('profile_type_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('username', 255);
            $table->string('url', 255);
            $table->dateTime('last_access');
            $table->timestamps();
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('profile_type_id')
                ->references('id')
                ->on('profile_types')
                ->onDelete('cascade');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
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
