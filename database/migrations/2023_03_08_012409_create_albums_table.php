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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('profile');
            $table->string('type');
            $table->string('title');
            $table->string('description');
            $table->unsignedBigInteger('multimedia_id');
            $table->unsignedBigInteger('situation_id');
            $table->timestamps();
        });

        Schema::table('albums', function (Blueprint $table) {
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('multimedia_id')
                ->references('id')
                ->on('multimedia')
                ->onDelete('cascade');

            $table->foreign('situation_id')
                ->references('id')
                ->on('albums_situations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
