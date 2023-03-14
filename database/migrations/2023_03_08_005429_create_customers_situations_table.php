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
        Schema::create('customers_situations', function (Blueprint $table) {
            $table->id();
            $table->string('situation', 50);
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
        Schema::dropIfExists('customers_situations');
    }
};
