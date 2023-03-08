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
        Schema::create('customers_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();
        });

        Schema::table('customers_permissions', function (Blueprint $table) {
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
        });

        Schema::table('customers_permissions', function (Blueprint $table) {
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_permissions');
    }
};
