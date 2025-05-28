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
        Schema::create('supply_requests', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');          // Name of the requested item
            $table->integer('quantity');          // Quantity requested
            $table->string('requested_by');       // Who requested it
            $table->date('request_date');         // Date of request
            $table->string('status')->default('pending');  // Request status (pending/approved/rejected)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_requests');
    }
};
