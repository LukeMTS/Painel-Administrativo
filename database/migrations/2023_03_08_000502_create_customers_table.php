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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('username', 99)->unique();
            $table->string('fullname', 255);
            $table->string('cpf', 11)->unique();
            $table->string('rg', 8);
            $table->date('birthdate');
            $table->string('email', 250)->unique();
            $table->string('phone', 14);
            $table->unsignedBigInteger('situation_id');
            $table->timestamps();
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('situation_id')
                ->references('id')
                ->on('customers_situations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
