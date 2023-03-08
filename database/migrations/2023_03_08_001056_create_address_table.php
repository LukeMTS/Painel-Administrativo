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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('zipcode', 255);
            $table->integer('state', 18);
            $table->string('city', 41)->nullable();
            $table->string('street', 255);
            $table->integer('number', 41);
            $table->string('complement', 255);
            $table->timestamps();
        });

        Schema::table('address', function (Blueprint $table) {
            $table->foreign('users_id')
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
        Schema::dropIfExists('address');
    }
};
