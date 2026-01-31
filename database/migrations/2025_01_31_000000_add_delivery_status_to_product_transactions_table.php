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
        Schema::table('product_transactions', function (Blueprint $table) {
            $table->string('delivery_status')->default('on_process')->after('proof');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_transactions', function (Blueprint $table) {
            $table->dropColumn('delivery_status');
        });
    }
};
