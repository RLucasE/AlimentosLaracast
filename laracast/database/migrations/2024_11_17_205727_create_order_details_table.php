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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("order")->unsigned();
            $table->foreign("order")->references("id")->on("orders");
            $table->bigInteger("offer")->unsigned();
            $table->foreign("offer")->references("id")->on('offers');
            $table->bigInteger("cant")->unsigned();
            $table->bigInteger("price")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
