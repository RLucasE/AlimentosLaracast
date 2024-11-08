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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('offer_num')->unsigned();
            $table->foreign("offer_num")->references('id')->on('offers')->cascadeOnDelete();
            $table->bigInteger('comp_num')->unsigned();
            $table->foreign("comp_num")->references('id')->on('users')->cascadeOnDelete();
            $table->bigInteger('vend_num')->unsigned();
            $table->foreign("vend_num")->references('id')->on('users')->cascadeOnDelete();
            $table->bigInteger('cant')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
